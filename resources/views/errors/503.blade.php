@extends('layouts.errors', ['title' => 'Service Unavailable'])

@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
