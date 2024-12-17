<template>
    <Suspense>

        <CharacterListInfiniteScroll/>

        <template #fallback>
            <Loading/>
        </template>

    </Suspense>
</template>

<script setup>

import CharacterListInfiniteScroll from "../components/Character/CharacterListInfiniteScroll.vue";
import Loading from "../components/Layout/Partials/Loading.vue";

</script>
