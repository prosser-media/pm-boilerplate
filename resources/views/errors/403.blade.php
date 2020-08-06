@extends('layouts.errors', ['title' => 'Access Denied'])

@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
