<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div class="flex">
        <div v-for="(breadcrumb, index) in $page.props.breadcrumbs">

            <component
                :is="(breadcrumb.active) ? 'span' : Link"
                :href="breadcrumb.href"
                :class="[{
                    'text-gray-700' : breadcrumb.active,
                    'text-indigo-400 hover:text-indigo-700' : !breadcrumb.active,
                }, ' text-sm']"
            >
                {{breadcrumb.text}}
            </component>

            <span v-if="index !== $page.props.breadcrumbs.length - 1" class="text-xs text-gray-300 px-1">::</span>
        </div>
    </div>
</template>
