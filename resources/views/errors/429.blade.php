@extends('errors::minimal')

@section('title', __('Demaciadas peticiones'))
@section('code', '429')
@section('message', __('Demaciadas peticiones realizadas al servidor'))
