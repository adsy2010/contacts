<script setup>
let props = defineProps({
    from: Number|String,
    to: Number|String,
    total: Number|String,
    links: Array
})
</script>

<template>
    <div class="px-4 py-3 flex items-center justify-between sm:px-6">
        <div class="flex-1 flex justify-between sm:hidden">
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    {{ ' ' }}
                    <span class="font-medium">{{ from }}</span>
                    {{ ' ' }}
                    to
                    {{ ' ' }}
                    <span class="font-medium">{{ to }}</span>
                    {{ ' ' }}
                    of
                    {{ ' ' }}
                    <span class="font-medium">{{ total }}</span>
                    {{ ' ' }}
                    results
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <div v-for="(link, index) in links">
                        <Link
                            v-if="link.url"
                            :href="link.url"
                            class="bg-white hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm border-gray-300"
                            :class="link.active ? 'font-bold text-indigo-500' : 'font-medium text-gray-500'"
                            v-html="link.label"
                            preserve-scroll
                        ></Link>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>
