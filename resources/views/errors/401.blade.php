@extends('layouts.errors', ['title' => 'Access Unauthorized'])

@section('code', '401')
@section('message', __('Unauthorized'))
