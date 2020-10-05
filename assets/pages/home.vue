<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-9 offset-2">
                    <div class="row">
                        <img src="build/images/fancy-logo.png" class="col-2 offset-5" />
                        <div class="col-12 text-center">
                            <h1>What do you fancy?</h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row" v-show="!loading">
                        <HomeText :intro-hidden="introHidden" class="col-8"/>
                        <SearchForm
                            @do-search="doSearch()"
                            v-show="!formHidden"
                        />
                        <Result :has-results="hasResults" v-show="hasResults"/>
                    </div>
                    <LoadingScreen v-show="loading"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Result           from '../components/result';
    import SearchForm       from '../components/search-form';
    import HomeText         from '../components/homeText';
    import LoadingScreen    from '../components/loadingScreen';
    export default {
        name: 'Home',
        data() {
            return {
                formHidden:     false,
                introHidden:    false,
                hasResults:     false,
                loading:        false,
            }
        },
        components: {
            SearchForm,
            HomeText,
            Result,
            LoadingScreen
        },

        methods: {
            hideSearchAndIntro() {
                this.formHidden = !this.formHidden;
                this.introHidden = !this.introHidden;
            },
            doSearch() {
                this.hideSearchAndIntro();
                this.loading = true;
            },
        }
    }

</script>
