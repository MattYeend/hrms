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

    'accepted' => 'Rhaid derbyn y maes :attribute.',
    'accepted_if' => 'Rhaid derbyn y maes :attribute pan :other yw :value.',
    'active_url' => "Rhaid i'r maes :attribute fod yn URL dilys.",
    'after' => "Rhaid i'r maes :attribute fod yn ddyddiad ar ôl :date.",
    'after_or_equal' => "Rhaid i'r maes :attribute fod yn ddyddiad ar ôl neu'n hafal i :date.",
    'alpha' => "Rhaid i'r maes :attribute gynnwys llythyrau yn unig.",
    'alpha_dash' => "Rhaid i'r maes :attribute gynnwys llythrennau, rhifau, llinellau toriad a thanlinellau yn unig.",
    'alpha_num' => "Rhaid i'r maes :attribute gynnwys llythrennau a rhifau yn unig.'",
    'array' => "Rhaid i'r maes :attribute fod yn arae.",
    'ascii' => "Rhaid i'r maes :attribute gynnwys nodau a symbolau un beit alffaniwmerig yn unig.",
    'before' => "Rhaid i'r maes :attribute fod yn ddyddiad cyn :date.",
    'before_or_equal' => "Rhaid i'r maes :attribute fod yn ddyddiad cyn neu'n hafal i :date.",
    'between' => [
        'array' => "Rhaid i'r maes :attribute fod rhwng eitemau :min a :max.",
        'file' => "Rhaid i'r maes :attribute :fod rhwng :min a :max kilobytes.",
        'numeric' => "Rhaid i'r maes :attribute fod rhwng :min a :max.",
        'string' => "Rhaid i'r maes :attribute fod rhwng nodau :min a :max.",
    ],
    'boolean' => "Rhaid i faes y :attribute fod yn wir neu'n anwir.",
    'can' => 'Mae maes :attribute yn cynnwys gwerth anawdurdodedig.',
    'confirmed' => "Nid yw'r cadarnhad maes :attribute yn cyfateb.",
    'contains' => 'Mae gwerth gofynnol ar goll yn y maes :attribute',
    'current_password' => "'Mae'r cyfrinair yn anghywir.",
    'date' => "Rhaid i'r maes :attribute fod yn ddyddiad dilys.",
    'date_equals' => "Rhaid i'r maes :attribute fod yn ddyddiad sy'n hafal i :date.",
    'date_format' => "Rhaid i'r maes :attribute gyfateb i fformat :format.",
    'decimal' => "Rhaid i'r maes :attribute fod â :decimal degol lleoedd.",
    'declined' => 'Rhaid gwrthod y maes :attribute.',
    'declined_if' => 'Rhaid gwrthod y maes :attribute pan fydd :other yn :value.',
    'different' => "Rhaid i'r maes :attribute ac :arall fod yn wahanol.",
    'digits' => "Rhaid i'r maes :attribute fod yn :digid ddigidau",
    'digits_between' => "Rhaid i'r maes :attribute : fod rhwng :min a :max digid.",
    'dimenions' => 'Mae gan y maes :attribute ddimensiynau delwedd annilys.',
    'distinct' => 'Mae gan y maes :attribute werth dyblyg.',
    'doesnt_end_with' => "Ni ddylai maes :attribute ddod i ben gydag un o'r canlynol: :values.",
    'doesnt_start_with' => "Rhaid i'r maes :attribute beidio â dechrau gydag un o'r canlynol: :values.",
    'email' => "Rhaid i'r maes :attribute fod yn gyfeiriad e-bost dilys.",
    'ends_with' => "Rhaid i'r maes :attribute ddod i ben gydag un o'r canlynol: :values.",
    'enum' => "Mae'r :attribute yn annilys.",
    'exists' => "Mae'r :attribute yn annilys.",
    'extensions' => "Rhaid i'r maes :attribute fod ag un o'r estyniadau canlynol: :values.",
    'file' => "Rhaid i'r maes :attribute fod yn ffeil.",
    'filled' => "Rhaid i'r maes :attribute fod â gwerth.",
    'gt' => [
        'array' => "Rhaid i'r maes :attribute fod â mwy nag :eitemau gwerth.",
        'file' => "Rhaid i faes :attribute fod yn fwy na :value kilobytes.",
        'numeric' => "Rhaid i'r maes :attribute fod yn fwy na :value.",
        'string' => "Rhaid i'r maes :attribute fod yn fwy na :nodau gwerth.",
    ],
    'gte' => [
        'array' => "Rhaid i'r maes :attribute gael :eitemau gwerth neu fwy.",
        'file' => "Rhaid i'r maes :attribute fod yn fwy na neu'n hafal i :value kilobytes.",
        'numeric' => "Rhaid i'r maes :attribute fod yn fwy na neu'n hafal i :value.",
        'string' => "Rhaid i'r maes :attribute fod yn fwy na neu'n hafal i nodau :value.",
    ],
    'hex_color' => "Rhaid i'r maes :attribute fod yn liw hecsadegol dilys.",
    'image' => "Rhaid i'r maes :attribute fod yn ddelwedd.",
    'in' => "Mae'r :attribute yn annilys.",
    'in_array' => "Rhaid i'r maes :attribute fodoli yn :other.",
    'integer' => "Rhaid i'r maes :attribute fod yn gyfanrif.",
    'ip' => "Rhaid i'r maes :attribute fod yn gyfeiriad IP dilys.",
    'ipv4' => "Rhaid i'r maes :attribute fod yn gyfeiriad IPv4 dilys.",
    'ipv6' => "Rhaid i'r maes :attribute fod yn gyfeiriad IPv6 dilys.",
    'json' => "Rhaid i'r maes :attribute fod yn llinyn JSON dilys.",
    'list' => "Rhaid i'r maes :attribute fod yn rhestr.",
    'lowercase' => "Rhaid i'r maes :attribute fod yn llythrennau bach.",
    'lt' => [
        'array' => "Rhaid i'r maes :attribute fod â llai na :eitemau gwerth.",
        'file' => "Rhaid i faes ::attribute fod yn llai na :value kilobytes.",
        'numeric' => "Rhaid i'r maes :attribute fod yn llai na :value.",
        'string' => "Rhaid i'r maes :attribute fod yn llai na :nodau gwerth.",
    ],
    'lte' => [
        'array' => "Ni ddylai'r maes :attribute fod â mwy nag :eitemau gwerth.",
        'file' => "Rhaid i'r maes :attribute fod yn llai na neu'n hafal i :value kilobytes.",
        'numeric' => "Rhaid i'r maes :attribute fod yn llai na neu'n hafal i :value.",
        'string' => "Rhaid i'r maes :attribute fod yn llai na neu'n hafal i nodau :value.",
    ],
    'mac_address' => "Rhaid i'r maes attribute fod yn gyfeiriad MAC dilys.",
    'max' => [
        'array' => "Ni ddylai'r maes :attribute fod â mwy nag eitemau :max.",
        'file' => 'Ni ddylai maes :attribute fod yn fwy na :kilobytes max.',
        'numeric' => 'Ni ddylai maes :attribute fod yn fwy na :max.',
        'string' => 'Ni ddylai maes :attribute fod yn fwy na nodau :max.',
    ],
    'max_digits' => "Ni ddylai'r maes :attribute fod â mwy na :max ddigidau.",
    'mimes' => "Rhaid i'r maes :attribute fod yn ffeil o'r math: :values.",
    'mimetypes' => "Rhaid i'r maes :attribute fod yn ffeil o fath : :values.",
    'min' => [
        'array' => "Rhaid i'r maes :attribute fod ag o leiaf :min eitemau.",
        'file' => "Rhaid i'r maes :attribute fod o leiaf :min kilobytes.",
        'numeric' => "Rhaid i'r maes :attribute fod o leiaf :min.",
        'string' => "Rhaid i'r maes :attribute fod o leiaf :min nodau.",
    ],
    'min_digits' => "Rhaid i'r maes :attribute fod ag o leiaf :min ddigidau.",
    'missing' => "Rhaid i'r maes :attribute fod ar goll.",
    'missing_if' => "Rhaid i'r maes :attribute fod ar goll pan mai :other yw :value.",
    'missing_unless' => "Rhaid i'r maes :attribute fod ar goll oni bai bod :arall yn :value.",
    'missing_with' => "Rhaid i'r maes :attribute fod ar goll pan fo :values yn bresennol.",
    'missing_with_all' => "Rhaid i'r maes :attribute fod ar goll pan fo :values yn bresennol.",
    'multiple_of' => "Rhaid i'r maes :attribute fod yn lluosrif o :value.",
    'not_in' => "Mae'r :attribute yn annilys.",
    'not_regex' => "Mae fformat y maes :attribute yn annilys.",
    'numeric' => "Rhaid i'r maes :attribute fod yn rhif.",
    'cyfrinair' => [
        'letters' => "Rhaid i'r maes :attribute gynnwys o leiaf un llythyren.",
        'mixed' => "Rhaid i'r maes :attribute gynnwys o leiaf un priflythrennau ac un llythyren fach.",
        'numbers' => "Rhaid i'r maes :attribute gynnwys o leiaf un rhif.",
        'symbols' => "Rhaid i'r maes :attribute gynnwys o leiaf un symbol.",
        'uncompromised' => "Mae'r :attribute wedi ymddangos mewn gollyngiad data. Dewiswch :attribute gwahanol.",
    ],
    'present' => "Rhaid i'r maes :attribute fod yn bresennol.",
    'present_if' => "Rhaid i'r maes :attribute fod yn bresennol pan mai :other yw :value.",
    'present_unless' => "Rhaid i'r maes :attribute fod yn bresennol oni bai bod :other yn :value.",
    'present_with' => "Rhaid i'r maes :attribute fod yn bresennol pan fo :values yn bresennol.",
    'present_with_all' => "Rhaid i'r maes :attribute fod yn bresennol pan fo :values yn bresennol.",
    'prohibited' => 'Mae maes :attribute wedi ei wahardd.',
    'prohibited_if' => "Mae maes :attribute wedi'i wahardd pan mae :other yn :value.",
    'prohibited_unless' => "Mae maes :attribute wedi ei wahardd oni bai bod :other mewn :values.",
    'prohibits' => "Mae maes :attribute yn gwahardd :other rhag bod yn bresennol.",
    'regex' => 'Mae fformat maes :attribute yn annilys.',
    'required' => 'Mae angen y maes :attribute.',
    'required_array_keys' => "Rhaid i'r maes :attribute gynnwys cofnodion ar gyfer: :values.",
    'required_if' => 'Mae angen y maes :attribute pan mae :other yn :value.',
    'required_if_accepted' => 'Mae angen y maes :attribute pan fydd :arall yn cael ei dderbyn.',
    'required_if_declined' => 'Mae angen y maes :attribute pan fydd :other yn cael ei wrthod.',
    'required_unless' => 'Mae angen y maes :attribute oni bai bod :other mewn :values.',
    'required_with' => 'Mae angen y maes :attribute pan fo :values yn bresennol.',
    'required_with_all' => 'Mae angen y maes :attribute pan fo :values yn bresennol.',
    'required_without' => 'Mae angen y maes :attribute pan nad yw :values yn bresennol.',
    'required_without_all' => 'Mae angen y maes :attribute pan nad oes unrhyw un o :values yn bresennol.',
    'same' => "Rhaid i'r maes :attribute gyfateb i :other.",
    'size' => [
        'array' => "Rhaid i'r maes :attribute gynnwys eitemau :size.",
        'file' => "Rhaid i'r maes :attribute fod yn :size kilobytes.",
        'numeric' => "Rhaid i'r maes :attribute fod yn :size.",
        'string' => "Rhaid i'r maes :attribute fod yn nodau :size.",
    ],
    'starts_with' => "Rhaid i'r maes :attrbute ddechrau gydag un o'r canlynol: :values.",
    'string' => "Rhaid i'r maes :attribute fod yn llinyn.",
    'timezone' => "Rhaid i'r maes :attribute fod yn gylchfa amser ddilys.",
    'unique' => "Mae'r :attribtue wedi'i gymryd yn barod.",
    'uploaded' => 'Methodd y :attribute lanlwytho.',
    'uppercase' => "Rhaid i'r maes :attribute fod yn briflythrennau.",
    'url' => "Rhaid i'r maes :attribute fod yn URL dilys.",
    'ulid' => "Rhaid i'r maes :attribute fod yn ULID dilys.",
    'uuid' => "Rhaid i'r maes :attribute fod yn UUID dilys.",

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
