<template>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand mb-0 h1" href="/">Rick and Morty</a>
            <router-link :to="{ name: 'home' }" class="nav-link">Home</router-link>
        </div>
    </nav>
</template>
