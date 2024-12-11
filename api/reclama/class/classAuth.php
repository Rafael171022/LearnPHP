<?php

Class AuthReq {
    public function validateMd5($value, $expectedHash) {
        return md5($value) === $expectedHash;
    }
}