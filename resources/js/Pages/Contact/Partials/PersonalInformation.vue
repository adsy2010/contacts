<script setup>
import {CogIcon, HomeIcon, PhoneIcon} from '@heroicons/vue/solid'
import DetailItem from "./DetailItem";
import {useForm} from "@inertiajs/inertia-vue3";

let props = defineProps({
    contact: Object,
})

let deleteAddress = (address) => {
    let form = useForm({});
    form.delete(`/contact/${props.contact.id}/address/${address.id}`, {

    });
}

let deletePhoneNumber = (number) => {
    let form = useForm({});
    form.delete(`/contact/${props.contact.id}/phoneNumber/${number.id}`, {

    });
}
</script>

<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Personal Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details.</p>
            </div>
            <div>
                <Link class="flex-shrink-0" :href="`/contact/${contact.id}/edit?show=personalInformation`">
                    <CogIcon class="h-10 w-10 text-gray-400 hover:text-gray-700"/>
                </Link>
            </div>
        </div>
        <div class="border-t border-gray-200">
            <dl>

                <DetailItem title="Full name">{{ contact.first_name }} {{ contact.last_name }}</DetailItem>
                <DetailItem title="Email address">{{ contact.email }}</DetailItem>
                <DetailItem title="Date of Birth">{{ contact.date_of_birth_long }}</DetailItem>

                <DetailItem title="Phone Numbers">
                    <ul role="list" class="divide-y divide-gray-200" v-if="contact.phone_numbers.length > 0">


                        <li class="py-3 flex items-center justify-between text-sm" v-for="phoneNumber in contact.phone_numbers">
                            <div class="w-0 flex-1 flex items-center">
                                <PhoneIcon class="flex-shrink-0 h-5 w-5 text-gray-400" aria-hidden="true" />
                                <span class="ml-2 flex-1 w-0 truncate"> {{phoneNumber.number}} </span>
                            </div>
                            <div class="ml-4 flex-shrink-0 space-x-2">
                                <Link
                                    :href="`/contact/${contact.id}/phoneNumber/${phoneNumber.id}/edit`"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                > Edit </Link>
                                <button
                                    @click="deletePhoneNumber(phoneNumber)"
                                    class="font-medium rounded-md text-red-600 hover:text-red-800"
                                >
                                    Delete
                                </button>
                            </div>
                        </li>



                    </ul>
                    <div class="divide-y divide-gray-200">
                        <Link class="text-indigo-400 underline hover:text-indigo-700" :href="`/contact/${contact.id}/phoneNumber/create`">
                            Add a phone number
                        </Link>
                    </div>
                </DetailItem>
                <DetailItem title="Addresses">
                    <ul role="list" class="divide-y divide-gray-200" v-if="contact.addresses.length > 0">


                        <li class="py-3 flex items-center justify-between text-sm" v-for="address in contact.addresses">
                            <div class="w-0 flex-1 flex items-center">
                                <HomeIcon class="flex-shrink-0 h-5 w-5 text-gray-400" aria-hidden="true" />
                                <span class="ml-2 flex-1 w-0 truncate"> {{address.address_1}}, {{address.city}} </span>
                            </div>
                            <div class="ml-4 flex-shrink-0 space-x-2">
                                <Link
                                    :href="`/contact/${contact.id}/address/${address.id}/edit`"
                                    class="font-medium text-indigo-600 hover:text-indigo-500"
                                > Edit </Link>
                                <button
                                    @click="deleteAddress(address)"
                                    class="font-medium rounded-md text-red-600 hover:text-red-800"
                                >
                                    Delete
                                </button>
                            </div>
                        </li>



                    </ul>
                    <div class="divide-y divide-gray-200">
                        <Link class="text-indigo-400 underline hover:text-indigo-700" :href="`/contact/${contact.id}/address/create`">
                            Add an address
                        </Link>
                    </div>
                </DetailItem>
            </dl>
        </div>
    </div>
</template>
