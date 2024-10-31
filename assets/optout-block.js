wp.blocks.registerBlockType('gaoo/block', {
    title: 'Opt-Out for Google Analytics',
    icon: 'chart-area',
    category: 'widgets',
    keywords: [
        'opt out',
        'optout',
        'opt-out',
        'google',
        'google analytics',
        'gdpr',
        'dsgvo',
    ],
    edit: function (props) {
        return ('[ga_optout]');
    },
    save: function (props) {
        return ('[ga_optout]');
    },
    example: {
        attributes: {
            'preview': true,
        },
    },
});