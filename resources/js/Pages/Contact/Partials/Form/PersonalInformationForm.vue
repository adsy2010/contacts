<script setup>
let props = defineProps({
    form: Object,
    edit: Boolean,
    firstName: Boolean,
    lastName: Boolean,
    email: Boolean,
    dateOfBirth: Boolean
});
let emit = defineEmits(['submit']);
</script>

<template>
  <div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
          <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <div id="person-information-form">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3" v-if="firstName">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                  <input v-model="form.first_name" type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                  <div class="text-red-600 text-xs">{{form.errors.first_name}}</div>
                </div>

                <div class="col-span-6 sm:col-span-3" v-if="lastName">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                  <input v-model="form.last_name" type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                  <div class="text-red-600 text-xs">{{form.errors.last_name}}</div>
                </div>

                <div class="col-span-6 sm:col-span-4" v-if="dateOfBirth">
                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input v-model="form.email" type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                    <div class="text-red-600 text-xs">{{form.errors.email}}</div>
                </div>

                <div class="col-span-6 sm:col-span-3" v-if="dateOfBirth">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                  <input v-model="form.date_of_birth" type="date" name="date-of-birth" id="date-of-birth" autocomplete="date-of-birth" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                    <div class="text-red-600 text-xs">{{form.errors.date_of_birth}}</div>
                </div>



<!--                <div class="col-span-6 sm:col-span-3">-->
<!--                  <label for="country" class="block text-sm font-medium text-gray-700">Country</label>-->
<!--                  <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">-->
<!--                    <option>United States</option>-->
<!--                    <option>Canada</option>-->
<!--                    <option>Mexico</option>-->
<!--                  </select>-->
<!--                </div>-->

<!--                <div class="col-span-6">-->
<!--                  <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>-->
<!--                  <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />-->
<!--                </div>-->

<!--                <div class="col-span-6 sm:col-span-6 lg:col-span-2">-->
<!--                  <label for="city" class="block text-sm font-medium text-gray-700">City</label>-->
<!--                  <input type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />-->
<!--                </div>-->

<!--                <div class="col-span-6 sm:col-span-3 lg:col-span-2">-->
<!--                  <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>-->
<!--                  <input type="text" name="region" id="region" autocomplete="address-level1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />-->
<!--                </div>-->

<!--                <div class="col-span-6 sm:col-span-3 lg:col-span-2">-->
<!--                  <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>-->
<!--                  <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />-->
<!--                </div>-->
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button
                  @click="emit('submit')"
                  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  v-text="edit ? 'save' : 'create'"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
