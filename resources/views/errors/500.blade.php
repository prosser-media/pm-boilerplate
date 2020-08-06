@extends('layouts.errors', ['title' => 'Server Error'])

@section('code', '500')
@section('message', __('Server Error'))
