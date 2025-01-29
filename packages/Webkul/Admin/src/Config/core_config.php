<?php

return [
    /**
     * General.
     */
    [
        'key'  => 'general',
        'name' => 'admin::app.configuration.index.general.title',
        'info' => 'admin::app.configuration.index.general.info',
        'sort' => 1,
    ], [
        'key'  => 'general.general',
        'name' => 'admin::app.configuration.index.general.general.title',
        'info' => 'admin::app.configuration.index.general.general.info',
        'icon' => 'icon-setting',
        'sort' => 1,
    ], [
        'key'    => 'general.general.locale_settings',
        'name'   => 'admin::app.configuration.index.general.general.locale-settings.title',
        'info'   => 'admin::app.configuration.index.general.general.locale-settings.title-info',
        'sort'   => 1,
        'fields' => [
            [
                'name'    => 'locale',
                'title'   => 'admin::app.configuration.index.general.general.locale-settings.title',
                'type'    => 'select',
                'default' => 'en',
                'options' => 'Webkul\Core\Core@locales',
            ],
        ],
    ], [
        'key'  => 'general.magic_ai',
        'name' => 'Magic AI',
        'info' => 'Magic AI',
        'icon' => 'icon-setting',
        'sort' => 3,
    ], [
        'key'    => 'general.magic_ai.settings',
        'name'   => 'General Settings',
        'info'   => 'Enhance your experience with the Magic AI feature by entering your exclusive API Key and indicating the pertinent Organization for effortless integration. Seize command over your OpenAI credentials and customize the settings according to your specific needs.',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'enable',
                'title'         => 'Enabled',
                'type'          => 'boolean',
                'channel_based' => true,
            ], [
                'name'          => 'model',
                'title'         => 'Models',
                'type'          => 'select',
                'channel_based' => true,
                'depends'       => 'enable:1',
                'options'       => [
                    [
                        'title' => 'GPT 4O',
                        'value' => 'gpt-4o',
                    ], [
                        'title' => 'GPT 4O Mini',
                        'value' => 'gpt-4o-mini',
                    ], [
                        'title' => 'Gemini 2.0 Flash',
                        'value' => 'gemini-2.0-flash-exp',
                    ], [
                        'title' => 'Deepseek r1 8b',
                        'value' => 'deepseek-r1:8b',
                    ], [
                        'title' => 'Ollama (llama3.2:latest)',
                        'value' => 'llama3.2:latest',
                    ], [
                        'title' => 'Llama 3.3 (Groq)',
                        'value' => 'llama-3.3-70b-versatile',
                    ],
                ],
            ], [
                'name'          => 'api_key',
                'title'         => 'API Key',
                'type'          => 'password',
                'depends'       => 'enable:1,model:*',
                'validation'    => 'required_if:enable,1',
                'info'          => 'Please ensure that you use a unique API key for each model type to maintain optimal performance and security.',
            ], [
                'name'          => 'organization',
                'title'         => 'Organization',
                'depends'       => 'enable:1',
                'type'          => 'text',
            ], [
                'name'          => 'api_domain',
                'title'         => 'LLM API Domain',
                'type'          => 'text',
                'info'          => 'For Olama And Grow only, Exp:- http://localhost:11434',
                'depends'       => 'enable:1',
            ],
        ],
    ], [
        'key'    => 'general.magic_ai.pdf_generation',
        'name'   => 'PDF Generation',
        'info'   => 'Enable the PDF Generation feature to automatically extract data from PDF files and convert them into text format. Enhance your productivity and efficiency by enabling this feature to streamline your workflow.',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'enabled',
                'title'         => 'Enabled',
                'type'          => 'boolean',
            ],
        ],
    ],

    /**
     * Email.
     */
    [
        'key'  => 'email',
        'name' => 'admin::app.configuration.index.email.title',
        'info' => 'admin::app.configuration.index.email.info',
        'sort' => 2,
    ], [
        'key'  => 'email.imap',
        'name' => 'admin::app.configuration.index.email.imap.title',
        'info' => 'admin::app.configuration.index.email.imap.info',
        'icon' => 'icon-setting',
        'sort' => 1,
    ], [
        'key'    => 'email.imap.account',
        'name'   => 'admin::app.configuration.index.email.imap.account.title',
        'info'   => 'admin::app.configuration.index.email.imap.account.title-info',
        'sort'   => 1,
        'fields' => [
            [
                'name'    => 'host',
                'title'   => 'admin::app.configuration.index.email.imap.account.host',
                'type'    => 'text',
                'default' => config('imap.accounts.default.host'),
            ],
            [
                'name'    => 'port',
                'title'   => 'admin::app.configuration.index.email.imap.account.port',
                'type'    => 'text',
                'default' => config('imap.accounts.default.port'),
            ],
            [
                'name'    => 'encryption',
                'title'   => 'admin::app.configuration.index.email.imap.account.encryption',
                'type'    => 'text',
                'default' => config('imap.accounts.default.encryption'),
            ],
            [
                'name'    => 'validate_cert',
                'title'   => 'admin::app.configuration.index.email.imap.account.validate-cert',
                'type'    => 'boolean',
                'default' => config('imap.accounts.default.validate_cert'),
            ],
            [
                'name'    => 'username',
                'title'   => 'admin::app.configuration.index.email.imap.account.username',
                'type'    => 'text',
                'default' => config('imap.accounts.default.username'),
            ],
            [
                'name'    => 'password',
                'title'   => 'admin::app.configuration.index.email.imap.account.password',
                'type'    => 'password',
                'default' => config('imap.accounts.default.password'),
            ],
        ],
    ],
];
