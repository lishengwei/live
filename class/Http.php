<?php

class Http
{
    private $proxyHost;
    private $proxyPort;
    private $headers;
    private $timeOut = 10;

    public function setProxy($host, $port)
    {
        $this->proxyHost = $host;
        $this->proxyPort = $port;
        return $this;
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function setTimeOut($timeOut)
    {
        $this->timeOut = $timeOut;
        return $this;
    }

    public function send($url, $body = [])
    {
        if (empty($url)) {
            throw new Exception('url不能为空', -1);
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeOut); // 设置超时限制防止死循环
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 不验证证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 不验证证书
        if (!empty($body)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }
        if (!empty($this->proxyHost) && !empty($this->proxyPort)) {
            curl_setopt($ch, CURLOPT_PROXY, $this->proxyHost);
            curl_setopt($ch, CURLOPT_PROXYPORT, $this->proxyPort);
        }
        if (!empty($this->headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        }
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}