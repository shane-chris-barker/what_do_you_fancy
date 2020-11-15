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
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">What will you eat?</h5>
                                    <form @submit.prevent="onSubmit" v-if="cuisinesLoaded">
                                        <div :class="componentClass">
                                            <span>
                                                <label for="inOrOutSelect" class="col-form-label">
                                                    Eat in or take out?
                                                </label>
                                                <select class="form-control" name="inOrOutSelect" id="inOrOutSelect" v-model="search.inOrOut">
                                                    <option value="in">Eat In</option>
                                                    <option value="out">Eat Out</option>
                                                </select>
                                                <label for="cuisine_select" class="col-form-label">What do you Fancy?</label>
                                                <select name="cuisine_select" id="cuisine_select" class="form-control" v-model="search.selectedCuisine">
                                                    <option v-for="cuisine in cuisines"
                                                            :key="cuisine.name"
                                                            :value="cuisine.name"
                                                            :selected="cuisine.name === search.selectedCuisine"
                                                    >
                                                        {{cuisine.name}}
                                                    </option>
                                                </select>
                                                <span class="btn btn-info form-control" @click="randomClicked">
                                                    Pick my cuisine for me!
                                                </span>
                                                <label for="postcode" class="col-form-label">
                                                    Enter your postcode
                                                </label>
                                                <input type="text" name="postcode" id="postcode" v-model="search.postcode" class="form-control" />
                                                <span>
                                                    <a class="alert-link" @click="locationClicked">Use my location instead...</a>
                                                </span>

                                            </span>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary col-4 offset-4">
                                                Feed me!
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <Result :has-results="hasResults" v-show="hasResults"/>
                    </div>
                    <LoadingScreen v-show="loading"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios            from 'axios';
    import Result           from '../components/result';
    import HomeText         from '../components/homeText';
    import LoadingScreen    from '../components/loadingScreen';
    export default {
        name: 'Home',
        data() {
            return {
                formHidden: false,
                introHidden: false,
                hasResults: false,
                loading: false,
                userLong: null,
                userLat: null,
                cuisinesLoaded: false,
                cuisines: null,
                search: {
                    inOrOut: '',
                    postcode: '',
                    selectedCuisine: 'Please Select'
                }
            }
        },
        computed: {
            /**
             *
             * @returns array
             */
            componentClass() {
                const classes = [this.$style.component, 'p-3', 'mb-2'];
                if (this.collapsed) {
                    classes.push(this.$style.collapsed);
                }
                return classes;
            }
        },
        components: {
            HomeText,
            Result,
            LoadingScreen
        },
        async mounted() {
            const cuisineResponse = await axios.get('/api/cuisines');
            this.cuisines = cuisineResponse.data;
            this.cuisinesLoaded = true;
            this.search.selectedCuisine = this.cuisines[0].name;
        },
        methods: {
            locationClicked() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(this.getUserLocation);
                } else {
                    // todo - handle this better - show an error not an alert
                    alert("Geolocation is not supported by this browser.");
                }
            },
            randomClicked() {
                const count = this.cuisines.length - 1;
                const randomIndex = Math.floor(Math.random() * count) + 1;
                this.search.selectedCuisine = this.cuisines[randomIndex].name;
            },

            getUserLocation(position) {
                this.userLat = position.coords.latitude;
                this.userLong = position.coords.longitude;
                axios.post(
                    '/location/detect',
                    {
                        long: this.userLong,
                        lat: this.userLat
                    })
                    .then((response) => {
                        this.search.postcode = response.data.postcode
                    }, (error) => {
                        // todo - handle this better - show an error not an alert
                        alert('The postcode lookup failed - Please enter your postcode manually')
                    });

            },
            onSubmit() {
                this.loading = true;

                axios.post(
                    '/eat',
                    {
                        postcode: this.search.postcode,
                        inOrOut: this.search.inOrOut,
                        cuisine: this.search.selectedCuisine,
                        long: this.userLong,
                        lat: this.userLat
                    })
                    .then((response) => {

                    }, (error) => {

                    });

            }
        }
    }

</script>
<style lang="scss" module>
    .component {
        text-align: center;
    }

</style>
