import { Component } from 'src/core/shopware';
import template from './sw-plugin-manager.html.twig';
import './sw-plugin-manager.scss';

Component.register('sw-plugin-manager', {
    template,

    methods: {
        onSearch(searchTerm) {
            this.searchTerm = searchTerm;
        }
    },

    data() {
        return {
            searchTerm: ''
        };
    }
});