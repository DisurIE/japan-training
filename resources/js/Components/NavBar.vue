<template>
    <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-blue-300 mb-3">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between md:w-auto  px-4 md:static md:block md:justify-start">
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="/">
                    Japan Training
                </a>
                <button class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-black border-solid border-transparent rounded bg-transparent block md:hidden outline-none focus:outline-none" type="button" v-on:click="toggleNavbar()">
                    <i class="fas fa-bars ">

                    </i>
                </button>
            </div>
            <div v-bind:class="{'hidden': !showMenu, 'flex': showMenu}" class="md:flex md:flex-grow items-center">
                <ul class="flex flex-col md:flex-row list-none ml-auto">
                    <li class="nav-item">
                        <NavLink class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" :href="route('radicals.index')" :active="route().current('radicals.index')">
                            <i class="fab fa-twitter text-md leading-md text-white opacity-75" /><span class="ml-2">Ключи</span>
                        </NavLink>
                    </li>
                    <li class="nav-item">
                        <NavLink class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" :href="route('hiragana-katakana.index')" :active="route().current('hiragana-katakana.index')">
                            <i class="fab fa-twitter text-md leading-md text-white opacity-75" /><span class="ml-2">Тренажер кан</span>
                        </NavLink>
                    </li>
                    <li class="nav-item">
                        <NavLink class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" :href="route('kanjis.index')" :active="route().current('kanjis.index')">
                            <i class="fab fa-twitter text-md leading-md text-white opacity-75" /><span class="ml-2">Кандзи</span>
                        </NavLink>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import NavLink from "@/Components/NavLink.vue";

export default {
    name: "navbar",
    components: {NavLink},
    data() {
        return {
            showMenu: false
        }
    },
    methods: {
        toggleNavbar: function(){
            this.showMenu = !this.showMenu;
        }
    }
}
</script>
