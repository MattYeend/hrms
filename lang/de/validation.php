<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Das :attribute Feld muss akzeptiert werden.',
    'accepted_if' => 'Das Feld :attribute muss akzeptiert werden, wenn :other :value ist.',
    'active_url' => 'Das Feld :attribute muss eine gültige URL sein.',
    'after' => 'Das :attribute Feld muss ein Datum nach :date sein.',
    'after_or_equal' => 'Das :attribute Feld muss ein Datum nach oder gleich :date sein.',
    'alpha' => 'Das :attribute Feld darf nur Buchstaben enthalten.',
    'alpha_dash' => 'Das Feld :attribute darf nur Buchstaben, Zahlen, Bindestriche und Unterstriche enthalten.',
    'alpha_num' => 'Das :attribute Feld darf nur Buchstaben und Zahlen enthalten.',
    'array' => 'Das :attribute Feld muss ein Array sein.',
    'ascii' => 'Das :attribute Feld darf nur alphanumerische Einzelbyte-Zeichen und -Symbole enthalten.',
    'before' => 'Das :attribute Feld muss ein Datum vor :date sein.',
    'before_or_equal' => 'Das :attribute Feld muss ein Datum vor oder gleich :date sein.',
    'between' => [
        'array' => 'Das :attribute Feld muss zwischen :min und :max Elemente enthalten.',
        'file' => 'Das :attribute Feld muss zwischen :min und :max Kilobyte liegen.',
        'numeric' => 'Das Feld :attribute muss zwischen :min und :max liegen.',
        'string' => 'Das :attribute Feld muss zwischen :min und :max Zeichen enthalten.',
    ],
    'boolean' => 'Das :attribute Feld muss wahr oder falsch sein.',
    'can' => 'Das :attribute Feld enthält einen nicht autorisierten Wert.',
    'confirmed' => 'Die :attribute Feld bestätigung stimmt nicht überein.',
    'contains' => 'Im Feld :attribute fehlt ein erforderlicher Wert.',
    'current_password' => 'Das Passwort ist falsch.',
    'date' => 'Das :attribute Feld muss ein gültiges Datum sein.',
    'date_equals' => 'Das :attribute Feld muss ein Datum sein, das :date entspricht.',
    'date_format' => 'Das :attribute Feld muss mit dem Format :format übereinstimmen.',
    'decimal' => 'Das :attribute Feld muss :decimal Dezimalstellen haben.',
    'declined' => 'Das Feld :attribute muss abgelehnt werden.',
    'declined_if' => 'Das Feld :attribute muss abgelehnt werden, wenn :other den Wert :value hat.',
    'different' => 'Das :attribute Feld und :other müssen unterschiedlich sein.',
    'digits' => 'Das Feld :attribute muss aus :digits Ziffern bestehen.',
    'digits_between' => 'Das :attribute Feld muss zwischen :min und :max Ziffern liegen.',
    'dimensions' => 'Das :attribute Feld hat ungültige Bildabmessungen.',
    'distinct' => 'Das Feld :attribute hat einen doppelten Wert.',
    'doesnt_end_with' => 'Das Feld :attribute darf nicht mit einem der folgenden Werte enden: :values.',
    'doesnt_start_with' => 'Das :attribute Feld darf nicht mit einem der folgenden Werte beginnen: :values.',
    'email' => 'Das :attribute-Feld muss eine gültige E-Mail-Adresse sein.',
    'ends_with' => 'Das Feld :attribute muss mit einem der folgenden Werte enden: :values.',
    'enum' => 'Das ausgewählte :attribute ist ungültig.',
    'exists' => 'Das ausgewählte :attribute ist ungültig.',
    'extensions' => 'Das Feld :attribute muss eine der folgenden Erweiterungen haben: :values.',
    'file' => 'Das :attribute Feld muss eine Datei sein.',
    'filled' => 'Das :attribute Feld muss einen Wert haben.',
    'gt' => [
        'array' => 'Das :attribute Feld muss mehr als :value Elemente enthalten.',
        'file' => 'Das :attribute Feld muss größer als :value Kilobyte sein.',
        'numeric' => 'Das :attribute Feld muss größer sein als :value.',
        'string' => 'Das :attribute Feld muss größer als :value Zeichen sein.',
    ],
    'gte' => [
        'array' => 'Das :attribute Feld muss :value-Elemente oder mehr enthalten.',
        'file' => 'Das :attribute Feld muss größer oder gleich :value Kilobyte sein.',
        'numeric' => 'Das :attribute Feld muss größer oder gleich :value sein.',
        'string' => 'Das :attribute Feld muss größer oder gleich :value-Zeichen sein.',
    ],
    'hex_color' => 'Das :attribute Feld muss eine gültige hexadezimale Farbe sein.',
    'image' => 'Das :attribute Feld muss ein Bild sein.',
    'in' => 'Das ausgewählte :attribute ist ungültig.',
    'in_array' => 'Das Feld :attribute muss in :other vorhanden sein.',
    'integer' => 'Das :attribute Feld muss eine Ganzzahl sein.',
    'ip' => 'Das :attribute Feld muss eine gültige IP-Adresse sein.',
    'ipv4' => 'Das :attribute Feld muss eine gültige IPv4-Adresse sein.',
    'ipv6' => 'Das :attribute Feld muss eine gültige IPv6-Adresse sein.',
    'json' => 'Das :attribute Feld muss eine gültige JSON-Zeichenfolge sein.',
    'list' => 'Das :attribute Feld muss eine Liste sein.',
    'lowercase' => 'Das :attribute Feld muss Kleinbuchstaben sein.',
    'lt' => [
        'array' => 'Das :attribute feld muss weniger als :value Elemente enthalten.',
        'file' => 'Das :attribute Feld muss kleiner als :value Kilobyte sein.',
        'numeric' => 'Das :attribute Feld muss kleiner sein als :value.',
        'string' => 'Das :attribute Feld muss weniger als :value Zeichen enthalten.',
    ],
    'lte' => [
        'array' => 'Das :attribute Feld darf nicht mehr als :value Elemente enthalten.',
        'file' => 'Das :attribute Feld muss kleiner oder gleich :value Kilobyte sein.',
        'numeric' => 'Das :attribute Feld muss kleiner oder gleich :value sein.',
        'string' => 'Das :attribute Feld muss kleiner oder gleich :value Zeichen sein.',
    ],
    'mac_address' => 'Das :attribute Feld muss eine gültige MAC-Adresse sein.',
    'max' => [
        'array' => 'Das :attribute Feld darf nicht mehr als :max Elemente enthalten.',
        'file' => 'Das Feld :attribute darf nicht größer als :max Kilobyte sein.',
        'numeric' => 'Das Feld :attribute darf nicht größer als :max sein.',
        'string' => 'Das :attribute Feld darf nicht größer als :max Zeichen sein.',
    ],
    'max_digits' => 'Das :attribute Feld darf nicht mehr als :max Ziffern haben.',
    'mimes' => 'Das :attribute Feld muss eine Datei vom Typ: :values sein.',
    'mimetypes' => 'Das :attribute Feld muss eine Datei vom Typ: :values sein.',
    'min' => [
        'array' => 'Das :attribute Feld muss mindestens :min Elemente enthalten.',
        'file' => 'Das :attribute Feld muss mindestens :min Kilobyte groß sein.',
        'numeric' => 'Das :attribute Feld muss mindestens :min.',
        'string' => 'Das :attribute Feld muss mindestens :min Zeichen enthalten.',
    ],
    'min_digits' => 'Das :attribute Feld muss mindestens :min Ziffern haben.',
    'missing' => 'Das :attribute Feld muss fehlen.',
    'missing_if' => 'Das Feld :attribute muss fehlen, wenn :other den Wert :value hat.',
    'missing_unless' => 'Das Feld :attribute muss fehlen, es sei denn, :other ist :value.',
    'missing_with' => 'Das Feld :attribute muss fehlen, wenn :values vorhanden ist.',
    'missing_with_all' => 'Das :attribute Feld muss fehlen, wenn :values vorhanden sind.',
    'multiple_of' => 'Das :attribute Feld muss ein Vielfaches von :value sein.',
    'not_in' => 'Das ausgewählte :Attribut ist ungültig.',
    'not_regex' => 'Das :attribute Feldformat ist ungültig.',
    'numeric' => 'Das :attribute Feld muss eine Zahl sein.',
    'password' => [
        'letters' => 'Das :attribute Feld muss mindestens einen Buchstaben enthalten.',
        'mixed' => 'Das :attribute Feld muss mindestens einen Groß- und einen Kleinbuchstaben enthalten.',
        'numbers' => 'Das :attribute Feld muss mindestens eine Zahl enthalten.',
        'symbols' => 'Das :attribute Feld muss mindestens ein Symbol enthalten.',
        'uncompromised' => 'Das angegebene :attribute ist in einem Datenleck aufgetaucht. Bitte wählen Sie ein anderes :attribute.',
    ],
    'present' => 'Das :attribute Feld muss vorhanden sein.',
    'present_if' => 'Das :attribute Feld muss vorhanden sein, wenn :other :value ist.',
    'present_unless' => 'Das Feld :attribute muss vorhanden sein, es sei denn, :other ist :value.',
    'present_with' => 'Das :attribute Feld muss vorhanden sein, wenn :values vorhanden ist.',
    'present_with_all' => 'Das :attribute Feld muss vorhanden sein, wenn :values vorhanden sind.',
    'prohibited' => 'Das Feld :attribute ist verboten.',
    'prohibited_if' => 'Das Feld :attribute ist verboten, wenn :other den Wert :value hat.',
    'prohibited_unless' => 'Das Feld :attribute ist verboten, es sei denn, :other ist in :values.',
    'prohibits' => 'Das :attribute Feld verhindert, dass :other vorhanden ist.',
    'regex' => 'Das :attribute Feldformat ist ungültig.',
    'required' => 'Das Feld :attribute ist erforderlich.',
    'required_array_keys' => 'Das :attribute Feld muss Einträge für: :values enthalten.',
    'required_if' => 'Das Feld :attribute ist erforderlich, wenn :other :value ist.',
    'required_if_accepted' => 'Das Feld :attribute ist erforderlich, wenn :other akzeptiert wird.',
    'required_if_declined' => 'Das Feld :attribute ist erforderlich, wenn :other abgelehnt wird.',
    'required_unless' => 'Das Feld :attribute ist erforderlich, es sei denn, :other ist in :values.',
    'required_with' => 'Das Feld :attribute ist erforderlich, wenn :values vorhanden ist.',
    'required_with_all' => 'Das :attribute Feld ist erforderlich, wenn :values vorhanden sind.',
    'required_without' => 'Das Feld :attribute ist erforderlich, wenn :values nicht vorhanden ist.',
    'required_without_all' => 'Das :attribute Feld ist erforderlich, wenn keiner der :values vorhanden ist.',
    'same' => 'Das :attribute Feld muss mit :other übereinstimmen.',
    'size' => [
        'array' => 'Das :attribute Feld muss :size Elemente enthalten.',
        'file' => 'Das :attribute Feld muss :size Kilobyte sein.',
        'numeric' => 'Das :attribute Feld muss :size sein.',
        'string' => 'Das :attribute Feld muss :size Zeichen enthalten.',
    ],
    'starts_with' => 'Das :attribute Feld muss mit einem der folgenden Werte beginnen: :values.',
    'string' => 'Das :attribute Feld muss ein String sein.',
    'timezone' => 'Das :attribute Feld muss eine gültige Zeitzone sein.',
    'unique' => 'Das :attribute wurde bereits vergeben.',
    'uploaded' => 'Das :attribute konnte nicht hochgeladen werden.',
    'uppercase' => 'Das Feld :attribute muss in Großbuchstaben geschrieben sein.',
    'url' => 'Das :attribute Feld muss eine gültige URL sein.',
    'ulid' => 'Das :attribute Feld muss eine gültige ULID sein.',
    'uuid' => 'Das :attribute Feld muss eine gültige UUID sein.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
