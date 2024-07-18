{{ $endpoint }}
@if (isset($error))
{{ $error }}
@else
Дата отчета: {{ $date }}
@foreach ($report as $key => $value)
{{ $key }}: {{ $value }}
@endforeach
@endif

