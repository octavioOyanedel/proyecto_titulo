<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
    'accepted'             => 'El campo debe ser aceptado.',
    'active_url'           => 'El campo no es una URL válida.',
    'after'                => 'El campo debe ser una fecha posterior a :date.',
    'alpha'                => 'El campo solo debe contener letras.',
    'alpha_dash'           => 'El campo solo debe contener letras, números y guiones.',
    'alpha_num'            => 'El campo solo debe contener letras y números.',
    'array'                => 'El campo debe ser un conjunto.',
    'before'               => 'El campo debe ser una fecha anterior a :date.',
    'between'              => [
        'numeric' => 'El campo tiene que estar entre :min - :max.',
        'file'    => 'El campo debe pesar entre :min - :max kilobytes.',
        'string'  => 'El campo tiene que tener entre :min - :max caracteres.',
        'array'   => 'El campo tiene que tener entre :min - :max ítems.',
    ],
    'boolean'              => 'El campo debe tener un valor verdadero o falso.',
    'confirmed'            => 'La confirmación no coincide.',
    'date'                 => 'El campo no es una fecha válida.',
    'date_format'          => 'El campo no corresponde al formato :format.',
    'different'            => 'El campo y :other deben ser diferentes.',
    'digits'               => 'El campo debe tener :digits dígitos.',
    'digits_between'       => 'El campo debe tener entre :min y :max dígitos.',
    'distinct'             => 'El campo contiene un valor duplicado.',
    'email'                => 'El campo no es un correo válido',
    'exists'               => 'El campo es inválido.',
    'filled'               => 'El campo es obligatorio.',
    'image'                => 'El campo debe ser una imagen.',
    'in'                   => 'El campo es inválido.',
    'in_array'             => 'El campo no existe en :other.',
    'integer'              => 'El campo debe ser un número entero.',
    'ip'                   => 'El campo debe ser una dirección IP válida.',
    'json'                 => 'El campo debe tener una cadena JSON válida.',
    'max'                  => [
        'numeric' => 'El campo no debe ser mayor a :max.',
        'file'    => 'El campo no debe ser mayor que :max kilobytes.',
        'string'  => 'El campo no debe ser mayor que :max caracteres.',
        'array'   => 'El campo no debe tener más de :max elementos.',
    ],
    'mimes'                => 'El campo debe ser un archivo con formato: :values.',
    'min'                  => [
        'numeric' => 'El tamaño debe ser de al menos :min.',
        'file'    => 'El tamaño debe ser de al menos :min kilobytes.',
        'string'  => 'El campo debe contener al menos :min caracteres.',
        'array'   => 'El campo debe tener al menos :min elementos.',
    ],
    'not_in'               => 'El campo es inválido.',
    'numeric'              => 'El campo debe ser numérico.',
    'present'              => 'El campo debe estar presente.',
    'regex'                => 'El formato de es inválido.',
    'required'             => 'El campo es obligatorio.',
    'required_if'          => 'El campo es obligatorio cuando :other es :value.',
    'required_unless'      => 'El campo es obligatorio a menos que :other esté en :values.',
    'required_with'        => 'El campo es obligatorio cuando :values está presente.',
    'required_with_all'    => 'El campo es obligatorio cuando :values está presente.',
    'required_without'     => 'El campo es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo es obligatorio cuando ninguno de :values estén presentes.',
    'same'                 => ':attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El tamaño de :attribute debe ser :size.',
        'file'    => 'El tamaño de :attribute debe ser :size kilobytes.',
        'string'  => 'El campo debe contener :size caracteres.',
        'array'   => 'El campo debe contener :size elementos.',
    ],
    'string'               => 'El campo debe ser una cadena de caracteres.',
    'timezone'             => 'El campo debe ser una zona válida.',
    'unique'               => 'El valor de este campo ya ha sido registrado.',
    'url'                  => 'El formato es inválido.',
    'captcha'              => 'El código captcha ingresado no es correcto',
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
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
    'attributes'           => [
        'name'                  => 'nombre',
        'username'              => 'usuario',
        'email'                 => 'correo electrónico',
        'first_name'            => 'nombre',
        'last_name'             => 'apellido',
        'password'              => 'contraseña',
        'password_confirmation' => 'confirmación de la contraseña',
        'city'                  => 'ciudad',
        'country'               => 'país',
        'address'               => 'dirección',
        'phone'                 => 'teléfono',
        'mobile'                => 'celular',
        'age'                   => 'edad',
        'sex'                   => 'sexo',
        'gender'                => 'género',
        'year'                  => 'año',
        'month'                 => 'mes',
        'day'                   => 'día',
        'hour'                  => 'hora',
        'minute'                => 'minuto',
        'second'                => 'segundo',
        'title'                 => 'título',
        'body'                  => 'contenido',
        'description'           => 'descripción',
        'excerpt'               => 'extracto',
        'date'                  => 'fecha',
        'time'                  => 'hora',
        'subject'               => 'asunto',
        'message'               => 'mensaje',
        'required'              => 'Requerido',
    ],
];