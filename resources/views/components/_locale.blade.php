<form class="d-inline" action="{{route('set_language_locale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn p-1">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="30" height="30" alt="">
        {{-- <i class="bi bi-translate fs-5"></i> --}}
    </button>
</form>