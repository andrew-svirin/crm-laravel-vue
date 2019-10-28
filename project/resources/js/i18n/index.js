import Vue from 'vue';
import VueI18n from 'vue-i18n';

Vue.use(VueI18n);

// Ready translated locale messages
const messages = {
    en: {
        message: {
            invoice: 'Invoice Members to estimate project.',
            estimate: 'Add Mailstones for Members could make Estimate.',
        },
        button: {
            invoice: 'Invoice Member',
            new_mailstone: "Add Mailstone",
        },
        title: {
            estimate: 'Estimate',
            members: 'Members',
        },
    },
    uk: {
        message: {
            invoice: 'Запросіть Учасника для оцінки Проекта.',
            estimate: 'Додавай Етапи для того, щоб Учасники могли зробити Оцінку.',
        },
        button: {
            invoice: 'Запросити Участника',
        },
        title: {
            estimate: 'Оцінка',
            members: 'Учасники',
        },
    }
};

// Create VueI18n instance with options
const i18n = new VueI18n({
    locale: 'en', // set locale
    messages, // set locale messages
});

export default i18n;