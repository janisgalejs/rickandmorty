<template>

    <router-link :to="{ name: 'home' }" class="btn btn-light mb-3">Go back</router-link>

    <Loading v-show="loading"/>

    <div class="card mb-3" v-if="character">
        <div class="card-body">
            <img :src="character.image" alt="...">
            <h5 class="card-title mt-3">{{ character.name }}</h5>
            <div class="card-text">
                <ul>
                    <li>Status: {{ character.status }}</li>
                    <li>Species: {{ character.species }}</li>
                    <li>Gender: {{ character.gender }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>

import {useRoute} from 'vue-router';
import {getCharacter} from "../api/character.js";
import {onMounted, ref} from "vue";
import Loading from "../components/Layout/Partials/Loading.vue";

const route = useRoute();
const loading = ref(false);
const character = ref(null);

onMounted(async () => {
    loading.value = true;
    character.value = await getCharacter(route.params.id);
    loading.value = false;
})

</script>

<style scoped>
.card-body img {
    max-width: 100%;
}
</style>
