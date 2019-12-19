@extends('errors::minimal')

@section('title', __('No autorizado'))
@section('code', '401')
@section('message', __('No autorizado, carece de credenciales válidas de autenticación para el recurso solicitado'))
