<footer>
    <div class="m-0">
        <div class="footer-content">
            <div class="year">{{ $gitTag }} &copy; {{ date('Y') }} HRMS.</div>
            {{ \Carbon\Carbon::now()->setTimezone(Auth::user()->timezone ?? config('app.timezone'))->format('d/m/Y H:i') }}
        </div>
    </div>
</footer>