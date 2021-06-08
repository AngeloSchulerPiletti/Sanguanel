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

    'accepted' => 'Os :attribute precisam ser aceitos.',
    'active_url' => 'O :attribute não é uma URL válida.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'O :attribute precisa ser válido.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'O :attribute precisa ser um arquivo.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'O :attribute precisa ser maior do que :value.',
        'file' => 'O :attribute precisa ser maior do que :value kilobytes.',
        'string' => 'O :attribute precisa ser maior do que :value caracteres.',
        'array' => 'O :attribute precisa ter mais que :value itens.',
    ],
    'gte' => [
        'numeric' => 'O :attribute precisa ser maior ou igual a :value.',
        'file' => 'O :attribute precisa ser maior ou igual a :value kilobytes.',
        'string' => 'O :attribute precisa ser maior ou igual a :value caracteres.',
        'array' => 'O :attribute precisa ter :value, ou mais, itens.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute must not be greater than :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'O :attribute precisa ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute precisa ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O :attribute precisa ter pelo menos :min.',
        'file' => 'O :attribute precisa ter pelo menos :min kilobytes.',
        'string' => 'A :attribute precisa ter pelo menos :min caracteres.',
        'array' => 'O :attribute precisa ter pelo menos :min itens.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'Senha incorreta.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'O formato de :attribute é inválido.',
    'required' => 'O campo de :attribute é obrigatório.',
    'required_if' => 'O campo de :attribute é obrigatório quando :other for :value.',
    'required_unless' => 'O campo de :attribute é obrigatório a menos que :other esteja em :values.',
    'required_with' => 'O campo de :attribute é obrigatório quando :values existir.',
    'required_with_all' => 'O campo de :attribute é obrigatório quando :values existirem.',
    'required_without' => 'O campo de :attribute é obrigatório quando :values não existir.',
    'required_without_all' => 'O campo de :attribute é obrigatório quando nenhum dos :values existirem.',
    'prohibited' => 'O campo de :attribute é proibido.',
    'prohibited_if' => 'O campo de :attribute é proibido quando :other for :value.',
    'prohibited_unless' => 'O campo de :attribute é proibido a menos que :other esteja em :values.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'O :attribute já foi registrado.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
