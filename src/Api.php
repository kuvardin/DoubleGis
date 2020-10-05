<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

use GuzzleHttp\Exception\GuzzleException;
use Kuvardin\DoubleGis\Exceptions\ApiError;
use GuzzleHttp;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class Api
{
    protected const HOST = 'https://catalog.api.2gis.ru';
    protected const CONNECTION_TIMEOUT_DEFAULT = 7;
    protected const REQUEST_TIMEOUT_DEFAULT = 10;
    protected const LOCALE_DEFAULT = Locales::RU_KZ;
    protected const USER_AGENT_DEFAULT = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:81.0) Gecko/20100101 Firefox/81.0';

    /**
     * @var Client
     */
    protected Client $client;

    /**
     * @var string Уникальный ключ пользователя API
     */
    protected string $key;

    /**
     * @var string|null Локаль
     */
    protected ?string $locale = self::LOCALE_DEFAULT;

    /**
     * @var int
     */
    public int $connection_timeout = self::CONNECTION_TIMEOUT_DEFAULT;

    /**
     * @var int
     */
    public int $request_timeout = self::REQUEST_TIMEOUT_DEFAULT;

    /**
     * @var string
     */
    public string $user_agent = self::USER_AGENT_DEFAULT;

    /**
     * @var callable Функция предобработки параметров
     */
    public $params_changer = null;

    /**
     * Api constructor.
     *
     * @param Client $client
     * @param string $key
     */
    public function __construct(Client $client, string $key)
    {
        $this->client = $client;
        $this->key = $key;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param int $region_id Идентификатор региона
     * @param string|null $query Произвольная поисковая строка
     * @param int|null $page Номер запрашиваемой страницы
     * @param int|null $page_size Количество результатов поиска, выводимых на одной странице
     * @param int[]|null $rubric_ids Идентификаторы категорий. Все категории должны быть из одного региона
     * @param string[]|null $types Типы объектов, среди которых производится поиск. При передаче нескольких типов менее
     * релевантные результаты одних типов могут вытесниться более релевантными других типов (Types)
     * @param string[]|null $fields Дополнительные поля, которые необходимо отобразить в ответе (Fields)
     * @param string|null $search_type Тип производимого поиска (Search\Types)
     * @param string|null $sort Тип сортировки результатов (Search\Sorts)
     * @param Location|null $sort_point Координаты точки, от которой производится сортировка
     * @param Location|null $point Центр области поиска. Используется для фильтрации результатов в окружности
     * @param int|null $radius Радиус поиска в метрах. Ограничение:
     * от 0 до 40000 — при наличии поискового запроса,
     * от 0 до 2000 — при отсутствии.
     * Значение по умолчанию: 250 — в сочетании с point, 0 — в сочетании с lon/lat.
     * Используется для фильтрации результатов в окружности.
     * @param string[]|null $district_ids Идентификаторы районов. Используется для фильтрации объектов по району.
     * Максимальное количество — 50
     * @param string[]|null $building_ids Идентификаторы зданий. Используется для фильтрации объектов в здании.
     * Максимальное количество — 50
     * @param string[]|null $city_ids Идентификаторы городов, разделённые запятыми.
     * Используется для фильтрации объектов по городу. Максимальное количество — 50
     * @param string|null $polygon Полигон в формате WKT.
     * Используется для фильтрации результатов в произвольной области.
     * @param Location|null $viewpoint1 Координаты левой верхней вершины прямоугольной области видимости
     * @param Location|null $viewpoint2 Координаты правой нижней вершины прямоугольной области видимости
     * @param bool|null $is_viewport_change
     * @return ItemsList
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getItemsByRegion(int $region_id, string $query = null, int $page = null, int $page_size = null,
        array $rubric_ids = null, array $types = null, array $fields = null, string $search_type = null,
        string $sort = null, Location $sort_point = null, Location $point = null, int $radius = null,
        array $district_ids = null, array $building_ids = null, array $city_ids = null, string $polygon = null,
        Location $viewpoint1 = null, Location $viewpoint2 = null, bool $is_viewport_change = null): ItemsList
    {
        $response = $this->request('3.0/items', [
            'locale' => $this->locale,
            'q' => $query,
            'type' => $types === null ? null : implode(',', $types),
            'fields' => $fields === null ? null : implode(',', $fields),
            'search_type' => $search_type,
            'sort' => $sort,
            'sort_point' => $sort_point === null ? null : (string)$sort_point,
            'point' => $point === null ? null : (string)$point,
            'radius' => $radius,
            'district_id' => $district_ids === null ? null : implode(',', $district_ids),
            'building_id' => $building_ids === null ? null : implode(',', $building_ids),
            'city_id' => $city_ids === null ? null : implode(',', $city_ids),
            'polygon' => $polygon,
            'viewpoint1' => $viewpoint1 === null ? null : (string)$viewpoint1,
            'viewpoint2' => $viewpoint2 === null ? null : (string)$viewpoint2,
            'region_id' => $region_id,
            'is_viewport_change' => $is_viewport_change,
            'page' => $page,
            'page_size' => $page_size,
            'rubric_id' => $rubric_ids === null ? null : implode(',', $rubric_ids),
        ]);

        return new ItemsList($response);
    }

    /**
     * @param int $region_id
     * @param string $query
     * @param int|null $page_size
     * @param string[]|null $fields
     * @param string[]|null $types
     * @param string[]|null $suggest_types
     * @param Location|null $location
     * @param bool|null $allow_deleted
     * @return array
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getSuggestsByRegion(int $region_id, string $query, int $page_size = null, array $fields = null,
        array $types = null, array $suggest_types = null, Location $location = null, bool $allow_deleted = null): array
    {
        return $this->request('3.0/suggests', [
            'locale' => $this->locale,
            'q' => $query,
            'fields' => implode(',', $fields ?? Fields::ALL),
            'type' => implode(',', $types ?? Types::ALL),
            'suggest_type' => implode(',', $suggest_types ?? Suggest\Types::ALL),
            'region_id' => $region_id,
            'location' => $location === null ? null : (string)$location,
            'page_size' => $page_size,
            'allow_deleted' => $allow_deleted,
        ]);
    }

    /**
     * @param Location $viewpoint1
     * @param Location $viewpoint2
     * @param string $query
     * @param int|null $page_size
     * @param string[]|null $fields
     * @param string[]|null $types
     * @param string[]|null $suggest_types
     * @param Location|null $location
     * @param bool|null $allow_deleted
     * @return array
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getSuggestsByViewpoints(Location $viewpoint1,Location $viewpoint2, string $query,
        int $page_size = null, array $fields = null, array $types = null, array $suggest_types = null,
        Location $location = null, bool $allow_deleted = null): array
    {
        return $this->request('3.0/suggests', [
            'locale' => $this->locale,
            'q' => $query,
            'fields' => implode(',', $fields ?? Fields::ALL),
            'type' => implode(',', $types ?? Types::ALL),
            'suggest_type' => implode(',', $suggest_types ?? Suggest\Types::ALL),
            'viewpoint1' => (string)$viewpoint1,
            'viewpoint2' => (string)$viewpoint2,
            'location' => $location === null ? null : (string)$location,
            'page_size' => $page_size,
            'allow_deleted' => $allow_deleted,
        ]);
    }

    /**
     * @return array
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getProfile(): array
    {
        return $this->request('3.0/profile/data');
    }

    /**
     * @param string $method
     * @param array|null $get
     * @return array
     * @throws ApiError
     * @throws GuzzleException
     */
    public function request(string $method, array $get = null): array
    {
        $url = self::HOST . '/' . ltrim($method, '/');

        $get ??= [];
        $get['key'] = $this->key;
        if ($this->params_changer !== null) {
            $get = call_user_func($this->params_changer, $url, $get);
            echo http_build_query($get), PHP_EOL;
        }

        $url .= '?' . http_build_query($get);

        $response = $this->client->get($url, [
            RequestOptions::CONNECT_TIMEOUT => $this->connection_timeout ?? self::CONNECTION_TIMEOUT_DEFAULT,
            RequestOptions::TIMEOUT => $this->request_timeout ?? self::REQUEST_TIMEOUT_DEFAULT,
            RequestOptions::DECODE_CONTENT => true,
            RequestOptions::HEADERS => [
                'User-Agent' => $this->user_agent ?? self::USER_AGENT_DEFAULT,
                'Accept' => 'application/json, text/plain, */*',
                'Accept-Language' => 'ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
                'Referer' => 'https://2gis.kz/',
                'DNT' => '1',
                'TE' => 'Trailers',
            ],
        ]);

        $decoded = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        if ($decoded['meta']['code'] !== 200) {
            throw new ApiError($decoded['meta']['error']['type'], $decoded['meta']['error']['message']);
        }

        return $decoded['result'];
    }
}
