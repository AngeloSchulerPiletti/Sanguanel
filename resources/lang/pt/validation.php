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

    'accepted' => 'O :attribute precisa ser aceito.',
    'active_url' => 'O :attribute não é uma URL válida.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'O :attribute precisa ser uma lista de elementos.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'O :attribute precisa estar entre :min e :max.',
        'file' => 'O :attribute precisa estar entre :min e :max kilobytes.',
        'string' => 'O :attribute precisa estar entre :min e :max caracteres.',
        'array' => 'O :attribute precisa ter entre :min e :max itens.',
    ],
    'boolean' => 'O campo de :attribute precisa ser verdadeiro ou falso.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'O formato de :attribute não confere com o formato :format.',
    'different' => 'O :attribute e :other precisam ser diferentes.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'O :attribute precisa ser válido.',
    'ends_with' => 'The :attribute precisa terminar em um dos seguintes valores: :values.',
    'exists' => 'O :attribute selecionado é inválido.',
    'file' => 'O :attribute precisa ser um arquivo.',
    'filled' => 'O campo de :attribute precisa ter um valor.',
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
    'image' => 'O :attribute precisa ser uma imagem.',
    'in' => 'O selected :attribute é inválido.',
    'in_array' => 'O campo de :attribute não existe em :other.',
    'integer' => 'O :attribute precisa ser um inteiro.',
    'ip' => 'O :attribute precisa ser um endereço de IP válido.',
    'ipv4' => 'O :attribute precisa ser um endereço IPv4 válido.',
    'ipv6' => 'O :attribute precisa ser um endereço IPv6 válido.',
    'json' => 'O :attribute precisa ser um JSON válido.',
    'lt' => [
        'numeric' => 'O :attribute precisa ser menor que :value.',
        'file' => 'O :attribute precisa ser menor que :value kilobytes.',
        'string' => 'O :attribute precisa ser menor que :value caracteres.',
        'array' => 'O :attribute precisa ter menos que :value itens.',
    ],
    'lte' => [
        'numeric' => 'O :attribute precisa ser menor ou igual a :value.',
        'file' => 'O :attribute precisa ser menor ou igual a :value kilobytes.',
        'string' => 'O :attribute precisa ser menor ou igual a :value caracteres.',
        'array' => 'O :attribute não deve ter mais que :value itens.',
    ],
    'max' => [
        'numeric' => 'O :attribute não deve ser maior que :max.',
        'file' => 'O :attribute não deve ser maior que :max kilobytes.',
        'string' => 'O :attribute não deve ser maior que :max caracteres.',
        'array' => 'O :attribute não deve ter mais que :max itens.',
    ],
    'mimes' => 'O :attribute precisa ser um arquivo do tipo: :values.',
    'mimetypes' => 'O :attribute precisa ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O :attribute precisa ter pelo menos :min.',
        'file' => 'O :attribute precisa ter pelo menos :min kilobytes.',
        'string' => 'A :attribute precisa ter pelo menos :min caracteres.',
        'array' => 'O :attribute precisa ter pelo menos :min itens.',
    ],
    'multiple_of' => 'O :attribute precisa ser múltiplo de :value.',
    'not_in' => 'O :attribute selecionado não é válido.',
    'not_regex' => 'O formato de :attribute é inválido.',
    'numeric' => 'O :attribute precisa ser um número.',
    'password' => 'Senha incorreta.',
    'present' => 'O campo de :attribute precisa estar presente.',
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
    'same' => 'O :attribute e :other precisam ser iguais.',
    'size' => [
        'numeric' => 'O :attribute precisa ser :size.',
        'file' => 'O :attribute precisa ser :size kilobytes.',
        'string' => 'O :attribute precisa ser :size caracteres.',
        'array' => 'O :attribute precisa conter :size itens.',
    ],
    'starts_with' => 'O :attribute precisa começar com um dos seguintes valores: :values.',
    'string' => 'O :attribute precisa ser uma string.',
    'timezone' => 'O :attribute precisa ser uma zona válida.',
    'unique' => 'O :attribute já foi registrado.',
    'uploaded' => 'O :attribute falhou durante o upload.',
    'url' => 'O formato de :attribute é inválido.',
    'uuid' => 'O :attribute precisa ser um UUID válido.',

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
        // '*' => [
        //     //
        // ],
        'password' => [
            'confirmed' => 'As senhas precisam ser iguais',
        ],
        'terms' => [
            'accepted' => 'Os termos precisam ser aceitos',
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

    'attributes' => [
        'password' => 'senha',
        'password_confirmation' => 'confirmação de senha',
        'name' => 'nome',
        'picture' => 'imagem',
        'picture1' => 'imagem',
        'picture2' => 'imagem',
        'image' => 'imagem',
        'profile' => 'imagem', 
        'subject' => 'assunto',
        'title' => 'título',
        'title1' => 'título',
        'title2' => 'título',
        'text' => 'texto',
        'text1' => 'texto',
        'text2' => 'texto',
        'description' => 'descrição',
        'terms' => 'termos de uso',
        'two_factor_secret' => 'código',
        'two_factor_recovery_codes' => 'código de recuperação',
        'state' => 'estado',
        'xp' => 'experiência',
        'brands' => 'marcas',
        'author' => 'autor',
        'keywords' => 'palavras-chave',
        'bio' => 'bio-descrição',

    ],

];
