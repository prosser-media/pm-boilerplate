@extends('layouts.errors', ['title' => 'Too Many Requests'])

@section('code', '429')
@section('message', __('Too Many Requests'))
