<?php namespace App\Contracts;

interface GetAccessToken extends HyperRequest
{
    public function getAccessToken(): string;

    public function getAccessTokenExpiration(): int;

    public function getRefreshToken(): string;
}