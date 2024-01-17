<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis;

use Error;
use GuzzleHttp\Exception\GuzzleException;
use Kuvardin\DoubleGis\Exceptions\DoubleGisApiError;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

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
    protected const LOCALE_DEFAULT = 'ru_KZ';
    protected const USER_AGENT_DEFAULT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) ' .
    'AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.71 Safari/537.36';

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
     * @param string $method
     * @param array|null $get
     * @return array
     * @throws DoubleGisApiError
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
                'Sec-Ch-Ua' => '"Not_A Brand";v="8", "Chromium";v="120"',
                'Accept' => 'application/json, text/plain, */*',
                'Sec-Ch-Ua-Mobile' => '?0',
                'Sec-Ch-Ua-Platform' => '"Windows"',
                'Origin' => 'https://2gis.kz',
                'Sec-Fetch-Site' => 'cross-site',
                'Sec-Fetch-Mode' => 'cors',
                'Sec-Fetch-Dest' => 'empty',
                'Referer' => 'https://2gis.kz/',
                'Accept-Encoding' => 'gzip, deflate',
                'Accept-Language' => 'ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
                'Priority' => 'u=1, i',
            ],
        ]);

        $content = $response->getBody()->getContents();
        $decoded = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        if ($decoded['meta']['code'] !== 200) {
            throw new DoubleGisApiError($decoded['meta']['error']['type'], $decoded['meta']['error']['message']);
        }

        return $decoded['result'];
    }
}
