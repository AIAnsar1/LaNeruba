<?php


namespace Http;


use App\Exceptions\MalformedUriException;
use net\Query;


class URL
{
    public readonly ?string $host;
    public readonly ?string $port;
    public readonly ?string $scheme;
    public readonly ?string $username;
    public readonly ?string $password;
    public readonly ?string $path;
    public readonly ?string $query;
    public readonly ?string $fragment;


    public function __construct($host, $port, $scheme, $username, $password, $path, $query, $fragment)
    {

    }


    public static function Parse(string $url)
    {
        $parts = \parse_url($url);

        if (FALSE === $parts)
        {
            throw MalformedUriException::ForUri($url);
        }

        return new self(
            $parts['host'] ?? NULL, 
            $parts['port'] ?? NULL, 
            $parts['scheme'] ?? NULL, 
            $parts['username'] ?? NULL, $
            $parts['password'] ?? NULL, $
            $parts['path'] ?? NULL,
            Query::Parse($parts['query'] ?? ''),
            $parts['fragment'] ?? NULL,
        );
    }
}