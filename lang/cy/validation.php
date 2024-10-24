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

    'accepted' => 'Rhaid i\'r maes :attribute gael ei dderbyn.',
    'accepted_if' => 'Rhaid i\'r maes :attribute gael ei dderbyn pan fo :other yn :value.',
    'active_url' => 'Rhaid i\'r maes :attribute fod yn URL dilys.',
    'after' => 'Rhaid i\'r maes :attribute fod yn ddyddiad ar ôl :date.',
    'after_or_equal' => 'Rhaid i\'r maes :attribute fod yn ddyddiad ar ôl neu gyfartal i :date.',
    'alpha' => 'Rhaid i\'r maes :attribute gynnwys llythrennau yn unig.',
    'alpha_dash' => 'Rhaid i\'r maes :attribute gynnwys llythrennau, rhifau, dashiau, a thanlinellau yn unig.',
    'alpha_num' => 'Rhaid i\'r maes :attribute gynnwys llythrennau a rhifau yn unig.',
    'array' => 'Rhaid i\'r maes :attribute fod yn array.',
    'ascii' => 'Rhaid i\'r maes :attribute gynnwys nodau alffaniwmerig un-beit a symbolau yn unig.',
    'before' => 'Rhaid i\'r maes :attribute fod yn ddyddiad cyn :date.',
    'before_or_equal' => 'Rhaid i\'r maes :attribute fod yn ddyddiad cyn neu gyfartal i :date.',
    'between' => [
        'array' => 'Rhaid i\'r maes :attribute gynnwys rhwng :min ac :max eitem.',
        'file' => 'Rhaid i\'r maes :attribute fod rhwng :min ac :max cilobeit.',
        'numeric' => 'Rhaid i\'r maes :attribute fod rhwng :min ac :max.',
        'string' => 'Rhaid i\'r maes :attribute fod rhwng :min ac :max nod.',
    ],
    'boolean' => 'Rhaid i\'r maes :attribute fod yn wir neu\'n ffug.',
    'can' => 'Mae\'r maes :attribute yn cynnwys gwerth heb awdurdod.',
    'confirmed' => 'Nid yw cadarnhad maes :attribute yn cyfateb.',
    'contains' => 'Mae\'r maes :attribute yn brin o werth angenrheidiol.',
    'current_password' => 'Mae\'r cyfrinair yn anghywir.',
    'date' => 'Rhaid i\'r maes :attribute fod yn ddyddiad dilys.',
    'date_equals' => 'Rhaid i\'r maes :attribute fod yn ddyddiad cyfartal i :date.',
    'date_format' => 'Rhaid i\'r maes :attribute gydymffurfio â\'r fformat :format.',
    'decimal' => 'Rhaid i\'r maes :attribute fod â :decimal lle degol.',
    'declined' => 'Rhaid i\'r maes :attribute gael ei wrthod.',
    'declined_if' => 'Rhaid i\'r maes :attribute gael ei wrthod pan fo :other yn :value.',
    'different' => 'Rhaid i\'r maes :attribute a :other fod yn wahanol.',
    'digits' => 'Rhaid i\'r maes :attribute fod yn :digits digid.',
    'digits_between' => 'Rhaid i\'r maes :attribute fod rhwng :min ac :max digid.',
    'dimensions' => 'Mae gan faes :attribute ddimensiynau delwedd annilys.',
    'distinct' => 'Mae gan faes :attribute werth dyblyg.',
    'doesnt_end_with' => 'Rhaid i\'r maes :attribute beidio â gorffen gydag un o\'r canlynol: :values.',
    'doesnt_start_with' => 'Rhaid i\'r maes :attribute beidio â dechrau gydag un o\'r canlynol: :values.',
    'email' => 'Rhaid i\'r maes :attribute fod yn gyfeiriad e-bost dilys.',
    'ends_with' => 'Rhaid i\'r maes :attribute orffen gydag un o\'r canlynol: :values.',
    'enum' => 'Mae\'r :attribute a ddewiswyd yn annilys.',
    'exists' => 'Mae\'r :attribute a ddewiswyd yn annilys.',
    'extensions' => 'Rhaid i\'r maes :attribute fod ag un o\'r estyniadau canlynol: :values.',
    'file' => 'Rhaid i\'r maes :attribute fod yn ffeil.',
    'filled' => 'Rhaid i\'r maes :attribute gael gwerth.',
    'gt' => [
        'array' => 'Rhaid i\'r maes :attribute gynnwys mwy na :value eitem.',
        'file' => 'Rhaid i\'r maes :attribute fod yn fwy na :value cilobeit.',
        'numeric' => 'Rhaid i\'r maes :attribute fod yn fwy na :value.',
        'string' => 'Rhaid i\'r maes :attribute fod yn fwy na :value nod.',
    ],
    'gte' => [
        'array' => 'Rhaid i\'r maes :attribute gynnwys :value eitem neu fwy.',
        'file' => 'Rhaid i\'r maes :attribute fod yn fwy neu gyfartal i :value cilobeit.',
        'numeric' => 'Rhaid i\'r maes :attribute fod yn fwy neu gyfartal i :value.',
        'string' => 'Rhaid i\'r maes :attribute fod yn fwy neu gyfartal i :value nod.',
    ],
    'hex_color' => 'Rhaid i\'r maes :attribute fod yn liw hecsadegol dilys.',
    'image' => 'Rhaid i\'r maes :attribute fod yn ddelwedd.',
    'in' => 'Mae\'r :attribute a ddewiswyd yn annilys.',
    'in_array' => 'Rhaid i\'r maes :attribute fodoli yn :other.',
    'integer' => 'Rhaid i\'r maes :attribute fod yn gyfanrif.',
    'ip' => 'Rhaid i\'r maes :attribute fod yn gyfeiriad IP dilys.',
    'ipv4' => 'Rhaid i\'r maes :attribute fod yn gyfeiriad IPv4 dilys.',
    'ipv6' => 'Rhaid i\'r maes :attribute fod yn gyfeiriad IPv6 dilys.',
    'json' => 'Rhaid i\'r maes :attribute fod yn linyn JSON dilys.',
    'list' => 'Rhaid i\'r maes :attribute fod yn restr.',
    'lowercase' => 'Rhaid i\'r maes :attribute fod yn llythrennau bach.',
    'lt' => [
        'array' => 'Rhaid i\'r maes :attribute gynnwys llai na :value eitem.',
        'file' => 'Rhaid i\'r maes :attribute fod yn llai na :value cilobeit.',
        'numeric' => 'Rhaid i\'r maes :attribute fod yn llai na :value.',
        'string' => 'Rhaid i\'r maes :attribute fod yn llai na :value nod.',
    ],
    'lte' => [
        'array' => 'Ni ddylai\'r maes :attribute gynnwys mwy na :value eitem.',
        'file' => 'Rhaid i\'r maes :attribute fod yn llai neu gyfartal i :value cilobeit.',
        'numeric' => 'Rhaid i\'r maes :attribute fod yn llai neu gyfartal i :value.',
        'string' => 'Rhaid i\'r maes :attribute fod yn llai neu gyfartal i :value nod.',
    ],
    'mac_address' => 'Rhaid i\'r maes :attribute fod yn gyfeiriad MAC dilys.',
    'max' => [
        'array' => 'Ni ddylai\'r maes :attribute gynnwys mwy na :max eitem.',
        'file' => 'Ni ddylai\'r maes :attribute fod yn fwy na :max cilobeit.',
        'numeric' => 'Ni ddylai\'r maes :attribute fod yn fwy na :max.',
        'string' => 'Ni ddylai\'r maes :attribute fod yn fwy na :max nod.',
    ],
    'max_digits' => 'Ni ddylai\'r maes :attribute fod â mwy na :max digid.',
    'mimes' => 'Rhaid i\'r maes :attribute fod yn ffeil o fath: :values.',
    'mimetypes' => 'Rhaid i\'r maes :attribute fod yn ffeil o fath: :values.',
    'min' => [
        'array' => 'Rhaid i\'r maes :attribute gynnwys o leiaf :min eitem.',
        'file' => 'Rhaid i\'r maes :attribute fod o leiaf :min cilobeit.',
        'numeric' => 'Rhaid i\'r maes :attribute fod o leiaf :min.',
        'string' => 'Rhaid i\'r maes :attribute fod o leiaf :min nod.',
    ],
    'min_digits' => 'Rhaid i\'r maes :attribute fod â o leiaf :min digid.',
    'missing' => 'Rhaid i\'r maes :attribute fod ar goll.',
    'missing_if' => 'Rhaid i\'r maes :attribute fod ar goll pan fo :other yn :value.',
    'missing_unless' => 'Rhaid i\'r maes :attribute fod ar goll oni bai fod :other yn :value.',
    'missing_with' => 'Rhaid i\'r maes :attribute fod ar goll pan fo :values yn bresennol.',
    'missing_with_all' => 'Rhaid i\'r maes :attribute fod ar goll pan fo :values yn bresennol.',
    'multiple_of' => 'Rhaid i\'r maes :attribute fod yn lluosrif o :value.',
    'not_in' => 'Mae\'r :attribute a ddewiswyd yn annilys.',
    'not_regex' => 'Mae\'r fformat maes :attribute yn annilys.',
    'numeric' => 'Rhaid i\'r maes :attribute fod yn rif.',
    'password' => [
        'letters' => 'Rhaid i\'r maes :attribute gynnwys o leiaf un llythyren.',
        'mixed' => 'Rhaid i\'r maes :attribute gynnwys o leiaf un llythyren fawr ac un llythyren fach.',
        'numbers' => 'Rhaid i\'r maes :attribute gynnwys o leiaf un rhif.',
        'symbols' => 'Rhaid i\'r maes :attribute gynnwys o leiaf un symbol.',
        'uncompromised' => 'Mae\'r :attribute a roddwyd wedi ymddangos mewn gollyngiad data. Dewiswch :attribute gwahanol.',
    ],
    'present' => 'Rhaid i\'r maes :attribute fod yn bresennol.',
    'present_if' => 'Rhaid i\'r maes :attribute fod yn bresennol pan fo :other yn :value.',
    'present_unless' => 'Rhaid i\'r maes :attribute fod yn bresennol oni bai fod :other yn :value.',
    'present_with' => 'Rhaid i\'r maes :attribute fod yn bresennol pan fo :values yn bresennol.',
    'present_with_all' => 'Rhaid i\'r maes :attribute fod yn bresennol pan fo :values yn bresennol.',
    'prohibited' => 'Mae\'r maes :attribute wedi\'i wahardd.',
    'prohibited_if' => 'Mae\'r maes :attribute wedi\'i wahardd pan fo :other yn :value.',
    'prohibited_unless' => 'Mae\'r maes :attribute wedi\'i wahardd oni bai fod :other yn :values.',
    'prohibits' => 'Mae\'r maes :attribute yn gwahardd :other rhag bod yn bresennol.',
    'regex' => 'Mae\'r fformat maes :attribute yn annilys.',
    'required' => 'Mae\'r maes :attribute yn orfodol.',
    'required_array_keys' => 'Rhaid i\'r maes :attribute gynnwys cofnodion ar gyfer: :values.',
    'required_if' => 'Mae\'r maes :attribute yn orfodol pan fo :other yn :value.',
    'required_if_accepted' => 'Mae\'r maes :attribute yn orfodol pan fydd :other yn cael ei dderbyn.',
    'required_if_declined' => 'Mae\'r maes :attribute yn orfodol pan fo :other yn cael ei wrthod.',
    'required_unless' => 'Mae\'r maes :attribute yn orfodol oni bai fod :other yn :values.',
    'required_with' => 'Mae\'r maes :attribute yn orfodol pan fo :values yn bresennol.',
    'required_with_all' => 'Mae\'r maes :attribute yn orfodol pan fo :values yn bresennol.',
    'required_without' => 'Mae\'r maes :attribute yn orfodol pan nad yw :values yn bresennol.',
    'required_without_all' => 'Mae\'r maes :attribute yn orfodol pan nad oes unrhyw un o :values yn bresennol.',
    'same' => 'Rhaid i\'r maes :attribute gyfateb i :other.',
    'size' => [
        'array' => 'Rhaid i\'r maes :attribute gynnwys :size eitem.',
        'file' => 'Rhaid i\'r maes :attribute fod yn :size cilobeit.',
        'numeric' => 'Rhaid i\'r maes :attribute fod yn :size.',
        'string' => 'Rhaid i\'r maes :attribute fod yn :size nod.',
    ],
    'starts_with' => 'Rhaid i\'r maes :attribute ddechrau gydag un o\'r canlynol: :values.',
    'string' => 'Rhaid i\'r maes :attribute fod yn llinyn.',
    'timezone' => 'Rhaid i\'r maes :attribute fod yn barth amser dilys.',
    'unique' => 'Mae\'r :attribute eisoes wedi\'i gymryd.',
    'uploaded' => 'Methwyd â llwytho\'r :attribute i fyny.',
    'uppercase' => 'Rhaid i\'r maes :attribute fod yn llythrennau mawr.',
    'url' => 'Rhaid i\'r maes :attribute fod yn URL dilys.',
    'ulid' => 'Rhaid i\'r maes :attribute fod yn ULID dilys.',
    'uuid' => 'Rhaid i\'r maes :attribute fod yn UUID dilys.',


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
