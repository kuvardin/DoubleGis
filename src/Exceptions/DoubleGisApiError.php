<?php

declare(strict_types=1);

namespace Kuvardin\DoubleGis\Exceptions;

use Exception;

/**
 * Class DoubleGisApiError
 *
 * @package Kuvardin\DoubleGis\Exceptions
 * @author Maxim Kuvardin <maxim@kuvard.in>
 */
class DoubleGisApiError extends Exception
{
    public const TYPE_INCORRECT_PARAMS = 'incorrectParams';
    public const TYPE_ITEM_NOT_FOUND = 'itemNotFound';

    /**
     * @var string
     */
    protected string $type;

    /**
     * ApiError constructor.
     *
     * @param string $type
     * @param string $message
     */
    public function __construct(string $type, string $message)
    {
        parent::__construct($message, 0, null);
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
