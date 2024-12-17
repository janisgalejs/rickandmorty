<template>
    <div ref="characterListContainer">
        <div class="card mb-3" v-for="character in characterList">
            <router-link :to="{ name: 'character', params: { id: character.id } }" class="card-body text-center">
                {{ character.name }}
            </router-link>
        </div>
    </div>

    <Loading v-show="charactersLoading"/>
</template>

<script setup>

import {onMounted, onUnmounted, ref} from "vue"
import {getCharacters} from "../../api/character.js"
import Loading from "../Layout/Partials/Loading.vue";

const characterListContainer = ref(null)
const characterList = ref(await getCharacters(1))
let currentPage = 1
const charactersLoading = ref(false)

const getCharactersOnScroll = async () => {
    if (characterListContainer.value.getBoundingClientRect().bottom < window.innerHeight && !charactersLoading.value) {
        charactersLoading.value = true;
        currentPage++;
        const newCharacters = await getCharacters(currentPage);
        characterList.value.push(...newCharacters);
        charactersLoading.value = false
    }
}

onMounted(() => {
    window.addEventListener('scroll', getCharactersOnScroll)
});

onUnmounted(() => {
    window.removeEventListener('scroll', getCharactersOnScroll)
})

</script>
