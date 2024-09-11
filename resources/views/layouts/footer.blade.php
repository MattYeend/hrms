<footer>
    <div class="container">
        <div class="footer-content">
            <div class="year">{{ $gitTag }} &copy; {{ date('Y') }} HRMS.</div>
            {{ \Carbon\Carbon::now()->setTimezone(config('app.timezone'))->format('d/m/Y H:i') }}
            <div class="languages">
                <span>Available languages:</span>
                <ul class="horizontal-list">
                    <li><x-flag-country-gb width="24" height="24"/></li>
                    <li><x-flag-country-pt width="24" height="24"/></li>
                    <li><x-flag-country-es width="24" height="24"/></li>
                    <li><x-flag-language-cy width="24" height="24"/></li>
                </ul>
            </div>
        </div>
    </div>
</footer>