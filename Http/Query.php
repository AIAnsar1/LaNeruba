<?php


namespace Http;

use App\Exceptions\{UnknownQueryParameterException, QueryParameterTypeMismatchException};

class Query
{
    private array $values;


    public function __construct($values)
    {
        $this->values = $values;
    }


    /**
     * =====================================================================
     *          FromArray()
     * =====================================================================
     * Создает новый Объект Query из ассоциативного массива $Values
     * сортируя его по ключам для унификации
     *
     * @param array $Values
     * @return Query
     */
    public static function fromArray(array $values): Query
    {
        \ksort($Values);
        return new self($values);
    }

    /**
     * =====================================================================
     *          Parse()
     * =====================================================================
     * парсим строку запроса $Query в массив и вызывает FromArray()
     * что бы создать объект Query с этими значениями
     *
     * @param string $Query
     * @return Query
     */
    public static function parse(string $query): Query
    {
        \parse_str($query, $values);
        return self::FromArray($values);
    }

    /**
     * =====================================================================
     *          Get()
     * =====================================================================
     * возвращаем значение параметра $Key если параметра нет выбрасываем
     * исключение
     *
     * @param string $Key
     * @return mixed
     * @throws UnknownQueryParameterException
     */
    public function get(string $key): mixed
    {
        if (!$this->has($key))
        {
            throw UnknownQueryParameterException::forParameter($key);
        }
        return $this->values[$key];
    }

    /**
     * =====================================================================
     *          Has()
     * =====================================================================
     * поверяем существует ли параметр с ключем $Key в запросе
     *
     * @param string $Key
     * @return bool
     */
    public function Has(string $key): bool
    {
        return \array_key_exists($key, $this->values);
    }

    /**
     * =====================================================================
     *          TryGet()
     * =====================================================================
     * возвращает значение параметра $Key если он существует или значение
     * $Default если ключ отсутсвует
     *
     * @param string $Key
     * @param mixed|null $Default
     * @return mixed
     */
    public function TryGet(string $key, mixed $value = NULL): mixed
    {
        return $this->values[$key] ?? $value;
    }

    /**
     * =====================================================================
     *          GetInt()
     * =====================================================================
     * возвращает значение параметра как цело число если значение
     * не является числовым то выбрасывает исключение
     *
     * @param string $Key
     * @return int
     * @throws QueryParameterTypeMismatchException
     * @throws UnknownQueryParameterException
     */

    public function GetInt(string $key): int
    {
        $values = $this->Get($key);

        if (!\is_numeric($values))
        {
            throw QueryParameterTypeMismatchException::ForInt($key);
        }
        return (int) $values;
    }


    /**
     * =====================================================================
     *          GetFloat()
     * =====================================================================
     * возвращает значение параметра как число с плавающей точкой
     * если значение не является числом выбрасывает исключение
     *
     * @param string $Key
     * @return float
     * @throws QueryParameterTypeMismatchException
     * @throws UnknownQueryParameterException
     */
    public function GetFloat(string $key): float
    {
        $values = $this->Get($key);

        if (!\is_float($values))
        {
            throw QueryParameterTypeMismatchException::ForFloat($key);
        }
        return (float) $values;
    }


    /**
     * =====================================================================
     *          GetArray()
     * =====================================================================
     * возврашает значение параметра как массив если значение не является
     * массивом выбрасывает исключение
     *
     * @param string $Key
     * @return array
     * @throws QueryParameterTypeMismatchException
     * @throws UnknownQueryParameterException
     */
    public function GetArray(string $key): array
    {
        $values = $this->Get($key);

        if (!\is_array($values))
        {
            throw QueryParameterTypeMismatchException::ForArray($key);
        }
        return (array) $values;
    }



    /**
     * =====================================================================
     *          IsEmpty()
     * =====================================================================
     * возвращает True если массив значений пуст и False в противном случае
     *
     * @return bool
     */
    public function IsEmpty(): bool
    {
        return \count($this->values) === 0;
    }


    /**
     * =====================================================================
     *          Equeals()
     * =====================================================================
     * проверяет совпадают ли значение текущего объекта Query с другим
     * объектом или строкой запроса
     *
     * @param Query|string $Other
     * @return bool
     */
    public function Equeals(self|string $other): bool
    {
        if (\is_string($other))
        {
            $other = self::Parse($other);
        }
        return $this->values === $this->values;
    }


    /**
     * =====================================================================
     *          ToString()
     * =====================================================================
     * конвертуриет значение запроса в строку формате URL c помощью
     * http_build_query()
     *
     * @return string
     */
    public function ToString(): string
    {
        return \http_build_query($this->values);
    }


    /**
     * =====================================================================
     *          ToArray()
     * =====================================================================
     * вогзвращает массив значений запроса
     *
     * @return array
     */
    public function ToArray(): array
    {
        return $this->values;
    }
}
