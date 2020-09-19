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
                    <div class="row">
                        <div class="col-6">
                            <HomeText :intro-hidden="introHidden"/>
                        </div>
                        <div class="col-4"  v-show="!formHidden">
                            <SearchForm @do-search="doSearch()" :cuisines="cuisines" :currentValue:="currentValue"/>
                        </div>
                        <div class="col-12" v-show="hasResults">
                            <Result :has-results="hasResults"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Result from '../components/result';
    import SearchForm from '../components/searchForm';
    import HomeText from '../components/homeText'
    export default {
        name: 'Home',
        data() {
            return {
                formHidden: false,
                introHidden: false,
                hasResults: false,
                currentValue: 'Please Select',
                cuisines : [
                    {name: 'Please Select'},
                    {name: 'Indian'},
                    {name: 'Chinese'},
                    {name: 'American'},
                    {name: 'Italian'},
                    {name: 'Mexican'},
                    {name: 'Thai'}
                ]
            }
        },
        components: {
            SearchForm,
            HomeText,
            Result
        },
        methods: {
            hideSearchAndIntro() {
                this.formHidden = !this.formHidden;
                this.introHidden = !this.introHidden;
            },
            doSearch() {
                this.hideSearchAndIntro();
            },
        }

    }

</script>