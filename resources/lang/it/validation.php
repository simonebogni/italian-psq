<?php
use Illuminate\Support\Str;
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

    'accepted' => 'Il/la :attribute deve essere accettato.',
    'active_url' => 'Il/la :attribute non è un URL valido.',
    'after' => 'Il/la :attribute deve essere una data successiva a :date.',
    'after_or_equal' => 'Il/la :attribute deve essere una data successiva o uguale a :date.',
    'alpha' => 'Il/la :attribute può contenere solo lettere.',
    'alpha_dash' => 'Il/la :attribute può contenere solo lettere, numeri, trattini e underscore.',
    'alpha_num' => 'Il/la :attribute può contenere solo lettere e numeri.',
    'array' => 'Il/la :attribute deve essere un array.',
    'before' => 'Il/la :attribute deve essere una data antecedente a :date.',
    'before_or_equal' => 'Il/la :attribute deve essere una data antecedente o uguale a :date.',
    'between' => [
        'numeric' => 'Il/la :attribute deve essere compreso tra :min e :max.',
        'file' => 'Il/la :attribute deve avere un peso compreso tra :min e :max kilobytes.',
        'string' => 'Il/la :attribute deve comprendere tra :min e :max caratteri.',
        'array' => 'Il/la :attribute deve comprendere tra :min e :max elementi.',
    ],
    'boolean' => 'Il/la campo :attribute deve essere vero o falso.',
    'confirmed' => 'La conferma del campo :attribute non coincide.',
    'date' => 'Il/la :attribute non è una data valida.',
    'date_equals' => 'Il/la :attribute deve essere una data uguaole a :date.',
    'date_format' => 'Il/la :attribute non coincide con il formato :format.',
    'different' => 'Il/la :attribute e il/la :other devono essere differenti.',
    'digits' => 'Il/la :attribute deve essere composto da :digits digits.',
    'digits_between' => 'Il/la :attribute deve essere composto da :min a :max digits.',
    'dimensions' => 'Il/la :attribute ha delle dimensioni di immagine non valide.',
    'distinct' => 'Il campo :attribute ha un valore duplicato.',
    'email' => 'Il/la :attribute deve essere un indirizzo email valido.',
    'ends_with' => 'Il/la :attribute deve terminare con uno o più dei seguenti valori: :values.',
    'exists' => 'Il/la :attribute selezionato non è valido.',
    'file' => 'Il/la :attribute deve essere un file.',
    'filled' => 'Il campo :attribute deve essere compilato.',
    'gt' => [
        'numeric' => 'Il/la :attribute deve essere maggiore di :value.',
        'file' => 'Il/la :attribute deve pesare più di :value kilobytes.',
        'string' => 'Il/la :attribute deve contenere più di :value caratteri.',
        'array' => 'Il/la :attribute deve contenere più di :value elementi.',
    ],
    'gte' => [
        'numeric' => 'Il/la :attribute deve essere maggiore o uguale a :value.',
        'file' => 'Il/la :attribute non deve pesare meno di :value kilobytes.',
        'string' => 'Il/la :attribute non deve contenere meno :value caratteri.',
        'array' => 'Il/la :attribute non deve contenere meno di :value elementi.',
    ],
    'image' => 'Il/la :attribute deve essere un\'immagine.',
    'in' => 'Il/la :attribute selezionato non è valido.',
    'in_array' => 'Il campo :attribute non esiste in :other.',
    'integer' => 'Il/la :attribute deve essere un numero intero.',
    'ip' => 'Il/la :attribute deve essere un indirizzo IP valido.',
    'ipv4' => 'Il/la :attribute deve essere un indirizzo IPv4 valido.',
    'ipv6' => 'Il/la :attribute deve essere un indirizzo IPv6 valido.',
    'json' => 'Il/la :attribute deve essere una stringa JSON valida.',
    'lt' => [
        'numeric' => 'Il/la :attribute deve essere inferiore a :value.',
        'file' => 'Il/la :attribute deve pesare meno di :value kilobytes.',
        'string' => 'Il/la :attribute deve contenere meno di :value caratteri.',
        'array' => 'Il/la :attribute deve contenere meno di :value elementi.',
    ],
    'lte' => [
        'numeric' => 'Il/la :attribute deve essere minore o uguale a :value.',
        'file' => 'Il/la :attribute deve pesare :value kilobytes o meno.',
        'string' => 'Il/la :attribute non deve contenere più di :value caratteri.',
        'array' => 'Il/la :attribute non deve contenere più di :value elementi.',
    ],
    'max' => [
        'numeric' => 'Il/la :attribute non può essere maggiore di :max.',
        'file' => 'Il/la :attribute non può pesare più di :max kilobytes.',
        'string' => 'Il/la :attribute non può contenere più di :max caratteri.',
        'array' => 'Il/la :attribute non può contenere più di :max elementi.',
    ],
    'mimes' => 'Il/la :attribute deve essere un file di tipo: :values.',
    'mimetypes' => 'Il/la :attribute deve essere un file di tipo: :values.',
    'min' => [
        'numeric' => 'Il/la :attribute non può essere minore di :min.',
        'file' => 'Il/la :attribute deve pesare almeno :min kilobytes.',
        'string' => 'Il/la :attribute deve contenere almeno :min caratteri.',
        'array' => 'Il/la :attribute deve contenere almeno :min elementi.',
    ],
    'multiple_of' => 'Il/la :attribute deve essere un multiplo di :value',
    'not_in' => 'Il valore :attribute non è valido.',
    'not_regex' => 'Il formato del(la) :attribute non è valido.',
    'numeric' => 'Il/la :attribute deve essere un numero.',
    'password' => 'La password non è corretta.',
    'present' => 'Il campo :attribute deve essere presente.',
    'regex' => 'Il formato del(la) :attribute non è valido.',
    'required' => 'Il campo :attribute è richiesto.',
    'required_if' => 'Il campo :attribute è richiesto quando il valore di :other è :value.',
    'required_unless' => 'Il campo :attribute è richiesto a meno che il valore di :other sia tra :values.',
    'required_with' => 'Il campo :attribute è richiesto quando il valore :values è presente.',
    'required_with_all' => 'Il campo :attribute è richiesto quando i valori :values sono presenti.',
    'required_without' => 'Il campo :attribute è richiesto quando il valore :values non è presente.',
    'required_without_all' => 'Il campo :attribute è richiesto quando nessuno dei valori :values sono presenti.',
    'same' => 'I campi :attribute e :other devono coincidere.',
    'size' => [
        'numeric' => 'Il/la :attribute deve essere :size.',
        'file' => 'Il/la :attribute deve pesare :size kilobytes.',
        'string' => 'Il/la :attribute deve contenere :size caratteri.',
        'array' => 'Il/la :attribute deve contenere :size elementi.',
    ],
    'starts_with' => 'Il/la :attribute deve iniziare con uno dei seguenti valori: :values.',
    'string' => 'Il/la :attribute deve essere una stringa.',
    'timezone' => 'Il/la :attribute deve essere un fuso orario valido.',
    'unique' => 'Il valore di :attribute indicato non è disponibile.',
    'uploaded' => 'Non è stato possibile fare l\'upload di :attribute.',
    'url' => 'Il formato del(la) :attribute non è valido.',
    'uuid' => 'Il/la :attribute deve essere un valido UUID.',

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

    'attributes' => [
        'pediatrician' => Str::lower(__("Pediatrician")),
        'role' => Str::lower(__("Role")),
        'name' => Str::lower(__("Name")),
        'email' => Str::lower(__("E-Mail Address")),
        'birthDate' => Str::lower(__("Birth date")),
        'phone' => Str::lower(__("Phone number")),
        'fiscalCode' => Str::lower(__("Fiscal code")),
    ],

];
