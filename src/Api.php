<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

use Error;
use GuzzleHttp\Exception\GuzzleException;
use Kuvardin\DoubleGis\Catalog\Organization;
use Kuvardin\DoubleGis\Exceptions\ApiError;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Kuvardin\DoubleGis\Geometry\Point;

/**
 * Class Api
 *
 * @package Kuvardin\DoubleGis
 * @author Maxim Kuvardin <maxim@kuvard.in>
 * @contributor Adilet Askarov <overfairy@gmail.com>
 */
class Api
{
    protected const HOST = 'https://catalog.api.2gis.ru';
    protected const CONNECTION_TIMEOUT_DEFAULT = 7;
    protected const REQUEST_TIMEOUT_DEFAULT = 10;
    protected const LOCALE_DEFAULT = Locales::RU_KZ;
    protected const USER_AGENT_DEFAULT = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:81.0) Gecko/20100101 ' .
        'Firefox/81.0';

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
     * @var int Таймаут соединения
     */
    public int $connection_timeout = self::CONNECTION_TIMEOUT_DEFAULT;

    /**
     * @var int Таймаут запроса
     */
    public int $request_timeout = self::REQUEST_TIMEOUT_DEFAULT;

    /**
     * @var string Юзер-агент
     */
    public string $user_agent = self::USER_AGENT_DEFAULT;

    /**
     * @var callable Функция предобработки параметров
     */
    public $params_changer = null;

    /**
     * @var string|null
     */
    public ?string $session_id = null;

    /**
     * Api constructor.
     *
     * @param Client $client
     * @param string $key
     * @param string|null $session_id
     */
    public function __construct(Client $client, string $key, string $session_id = null)
    {
        $this->client = $client;
        $this->key = $key;
        $this->session_id = $session_id;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Получение коллекции объектов.
     * Осуществляет поиск мест по заданному запросу и выдаёт список результатов, разбитых на страницы.
     *
     * @param int|null $region_id Идентификатор региона | Обязателен, если не задано географическое ограничение поиска.
     * @param string|null $query Произвольная поисковая строка
     * @param int|null $page Номер запрашиваемой страницы (по умолчанию = 1)
     * @param int|null $page_size Количество результатов поиска, выводимых на одной странице (по умолчанию = 20)
     * @param int[]|null $rubric_ids Идентификаторы категорий. Все категории должны быть из одного региона (необходимо передать region_id)
     * @param string[]|null $types Типы объектов, среди которых производится поиск. При передаче нескольких типов менее
     * релевантные результаты одних типов могут вытесниться более релевантными других типов (Types)
     * @param string[]|null $fields Дополнительные поля, которые необходимо отобразить в ответе (Fields)
     * @param string|null $search_type Тип производимого поиска (Search\Types)
     * @param string|null $sort Тип сортировки результатов (Search\Sorts)
     * @param Point|null $sort_point Координаты точки, от которой производится сортировка
     * @param Point|null $point Центр области поиска. Используется для фильтрации результатов в окружности
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
     * @param Point|null $viewpoint1 Координаты левой верхней вершины прямоугольной области видимости
     * @param Point|null $viewpoint2 Координаты правой нижней вершины прямоугольной области видимости
     * @param Organization|null $org_id Фильтр по идентификатору организации, к которой относится компания.
     * @param bool|null $is_viewport_change
     * @param bool|null $has_photos Фильтр по наличию фотографий. Принимает значения: true или false.
     * @param bool|null $has_rating Фильтр по наличию рейтинга на flamp.ru. Принимает значения: true или false.
     * @param bool|null $has_reviews Фильтр по наличию отзывов на flamp.ru. Принимает значения: true или false.
     * @param bool|null $has_site Фильтр по наличию сайта. Принимает значения: true или false.
     * @param string|null $work_time Example: work_time=tue,alltime
     * Время работы организации. Формат: [day],[time] или now (текущий день и время).
     * Примеры:
     * Понедельник, 17:00 — mon,17:00
     * Четверг, 9:00 — thu,09:00
     * Сегодня, 9:00 — today,09:00
     * Пятница, весь день — fri,alltime
     * Сейчас — now
     * @param string|null $opened_after_date Example: opened_after_date=2001-01-24
     * Фильтрует компании у которых дата открытия позже чем переданный параметр.
     * Принимает значения в формате YYYY-MM-DD.
     * @param bool|null $has_itin Фильтр по наличию индивидуального номера налогоплательщика. Принимает значения: true или false.
     * @param bool|null $has_trade_license Фильтр по наличию торговой лицензии. Принимает значения true или false.
     * @return Catalog\ItemsList
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getCatalogItemsByRegion(int $region_id = null, string $query = null, int $page = null,
        int $page_size = null, array $rubric_ids = null, array $types = null, array $fields = null,
        string $search_type = null, string $sort = null, Point $sort_point = null, Point $point = null,
        int $radius = null, array $district_ids = null, array $building_ids = null, array $city_ids = null,
        string $polygon = null, Point $viewpoint1 = null, Point $viewpoint2 = null, Organization $org_id = null,
        bool $is_viewport_change = null, bool $has_photos = null, bool $has_rating = null, bool $has_reviews = null,
        bool $has_site = null, string $work_time = null, string $opened_after_date = null, bool $has_itin = null,
        bool $has_trade_license = null): Catalog\ItemsList
    {
        $response = $this->request('3.0/items', [
            'locale' => $this->locale,
            'q' => $query,
            'type' => $types === null ? null : implode(',', $types),
            'fields' => $fields === null ? null : implode(',', $fields),
            'search_type' => $search_type,
            'sort' => $sort,
            'sort_point' => $sort_point === null ? null : $sort_point->getStringForRequest(),
            'point' => $point === null ? null : $point->getStringForRequest(),
            'radius' => $radius,
            'district_id' => $district_ids === null ? null : implode(',', $district_ids),
            'building_id' => $building_ids === null ? null : implode(',', $building_ids),
            'city_id' => $city_ids === null ? null : implode(',', $city_ids),
            'polygon' => $polygon,
            'viewpoint1' => $viewpoint1 === null ? null : $viewpoint1->getStringForRequest(),
            'viewpoint2' => $viewpoint2 === null ? null : $viewpoint2->getStringForRequest(),
            'region_id' => $region_id === null ? null : $region_id,
            'is_viewport_change' => $is_viewport_change,
            'org_id' => $org_id,
            'has_photos' => $has_photos,
            'has_rating' => $has_rating,
            'has_reviews' => $has_reviews,
            'has_site' => $has_site,
            'work_time' => $work_time,
            'opened_after_date' => $opened_after_date,
            'has_itin' => $has_itin,
            'has_trade_license' => $has_trade_license,
            'page' => $page,
            'page_size' => $page_size,
            'rubric_id' => $rubric_ids === null ? null : implode(',', $rubric_ids),
        ]);

        return new Catalog\ItemsList($response);
    }

    /**
     * Получение списка категорий по параметрам.
     * Осуществляет выдачу списка всех существующих категорий по заданным параметрам.
     *
     * @param int $region_id Идентификатор региона
     * @param int|null $parent_id Идентификатор родительской категории
     * @param string|null $sort Сортировка результатов. Допустимые значения:
     * name - по наименованию (в алфавитном порядке по возрастанию).
     * Если параметр не передан, сортировка не применяется
     * @return Rubricator\ItemsList
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getRubricatorItemsList(int $region_id, int $parent_id = null,
        string $sort = null): Rubricator\ItemsList
    {
        $response = $this->request('3.0/rubricator/list', [
            'region_id' => $region_id,
            'locale' => $this->locale,
            'parent_id' => $parent_id,
            'sort' => $sort,
        ]);
        return new Rubricator\ItemsList($response);
    }

    /**
     * Получение дашбоард-рубрикатора по параметрам.
     * Возвращает дашбоард, удовлетворяющий параметрам, переданным в запросе.
     *
     * @param int $region_id Идентификатор региона
     * @return Rubricator\ItemsList
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getRubricatorDashboard(int $region_id): Rubricator\ItemsList
    {
        $response = $this->request('3.0/rubricator/dashboard', [
            'region_id' => $region_id,
            'locale' => $this->locale,
        ]);
        return new Rubricator\ItemsList($response);
    }

    /**
     * Получение категории.
     * Выводит подробную информацию о категории по её уникальному идентификатору.
     *
     * @param int $region_id
     * @param int $rubric_id
     * @return Rubricator\Rubric
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getRubricatorItem(int $region_id, int $rubric_id): Rubricator\Rubric
    {
        $response = $this->request('3.0/rubricator/get', [
            'region_id' => $region_id,
            'id' => $rubric_id,
            'locale' => $this->locale,
        ]);
        return Rubricator\Rubric::make($response);
    }

    /**
     * @param int $region_id
     * @param string $query
     * @param int|null $page_size
     * @param string[]|null $fields
     * @param string[]|null $types
     * @param string[]|null $suggest_types
     * @param Point|null $location
     * @param bool|null $allow_deleted
     * @return array
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getSuggestsByRegion(int $region_id, string $query, int $page_size = null, array $fields = null,
        array $types = null, array $suggest_types = null, Point $location = null, bool $allow_deleted = null): array
    {
        return $this->request('3.0/suggests', [
            'locale' => $this->locale,
            'q' => $query,
            'fields' => implode(',', $fields ?? Suggests\Fields::ALL),
            'type' => implode(',', $types ?? Suggests\Types::ALL),
            'suggest_type' => implode(',', $suggest_types ?? Suggests\Types::ALL),
            'region_id' => $region_id,
            'location' => $location === null ? null : $location->getStringForRequest(),
            'page_size' => $page_size,
            'allow_deleted' => $allow_deleted,
        ]);
    }

    /**
     * @param Point $viewpoint1
     * @param Point $viewpoint2
     * @param string $query
     * @param int|null $page_size
     * @param string[]|null $fields
     * @param string[]|null $types
     * @param string[]|null $suggest_types
     * @param Point|null $location
     * @param bool|null $allow_deleted
     * @return array
     * @throws ApiError
     * @throws GuzzleException
     */
    public function getSuggestsByViewpoints(Point $viewpoint1,Point $viewpoint2, string $query,
        int $page_size = null, array $fields = null, array $types = null, array $suggest_types = null,
        Point $location = null, bool $allow_deleted = null): array
    {
        return $this->request('3.0/suggests', [
            'locale' => $this->locale,
            'q' => $query,
            'fields' => implode(',', $fields ?? Suggests\Fields::ALL),
            'type' => implode(',', $types ?? Suggests\Types::ALL),
            'suggest_type' => implode(',', $suggest_types ?? Suggests\Types::ALL),
            'viewpoint1' => $viewpoint1->getStringForRequest(),
            'viewpoint2' => $viewpoint2->getStringForRequest(),
            'location' => $location === null ? null : $location->getStringForRequest(),
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

        if ($this->session_id !== null) {
            $get['stat[sid]'] = $this->session_id;
        }

        if ($this->params_changer !== null) {
            $get_changed = call_user_func($this->params_changer, $url, $get);
            if ($get_changed === false) {
                throw new Error('Params changer error');
            }
            $get = $get_changed;
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
//                'Accept-Encoding' => 'gzip, deflate, br',
                'Origin' => 'https://2gis.kz',
                'DNT' => '1',
                'Referer' => 'https://2gis.kz/karaganda?m=73.055817%2C49.815017%2F13.63',
                'Cookie' => 'lang=ru; country=1; language=ru; city=32; _2gis_webapi_user=afa51cb4-9586-40f1-bfe1-b8d9e874587e; openBeta=1; _2gis_webapi_session=d7145692-951b-4925-8147-566be35af28d',
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
