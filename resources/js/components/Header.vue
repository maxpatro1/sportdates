<template>
    <b-navbar :toggleable="false" type="dark" variant="primary" class="shadow fixed-top">
        <b-navbar-brand to="/" class="d-flex flex-row align-items-center">
            <div>
                <div class="head-title">
                    sportdates
                </div>
            </div>
        </b-navbar-brand>
        <b-navbar-nav class="ml-auto">
            <b-nav-item-dropdown no-caret right class="flex-center">
                <template #button-content>
                    <b-icon icon="question-circle" />
                </template>
                <b-dropdown-item href="tel:+78126551377">
                    <b-icon icon="telephone" /> ОТП: 655-13-77
                </b-dropdown-item>
                <b-dropdown-item href="tel:+78126551364">
                    <b-icon icon="telephone" /> ОИС: 655-13-64
                </b-dropdown-item>
                <b-dropdown-item href="mailto:priem-support@etu.ru">
                    <b-icon icon="envelope" /> priem-support@etu.ru
                </b-dropdown-item>
            </b-nav-item-dropdown>
            <b-nav-item-dropdown no-caret right toggle-class="text-right">
                <template #button-content>
          <span>
            <span class="d-none d-md-inline">{{ user.fio }}</span>
            <span class="d-md-none">{{ user.initials }}</span>
            <br>
            <span class="small text-white-50">
              <template v-if="user.email && user.phone">
                {{ user.email }} • {{ user.phone }}
              </template>
              <template v-else-if="user.email">
                {{ user.email }}
              </template>
              <template v-else-if="user.phone">
                {{ user.phone }}
              </template>
            </span>
          </span>
                </template>
                <b-dropdown-text text-class="p-0" tag="div">
                    <b-list-group flush>
                        <b-list-group-item
                            v-for="worker in user.admission_department_workers"
                            :key="worker.id"
                        >
                            {{ $store.getters.getDictItemById('dict_admission_departments', worker.admission_department_id).dv }}
                            <span class="text-muted small">({{ $store.getters.getDictItemById('dict_campaign_types', worker.dict_campaign_type_id).dv }})</span>
                            <p class="small mb-0">
                                {{ $store.getters.getDictItemById('dict_admission_department_worker_types', worker.dict_admission_department_worker_type_id).dv }}
                            </p>
                        </b-list-group-item>
                    </b-list-group>
                </b-dropdown-text>
                <b-dropdown-item href="/">
                    Режим абитуриента
                </b-dropdown-item>
                <b-dropdown-item href="/logout">
                    <b-icon icon="box-arrow-right" /> Выйти
                </b-dropdown-item>
            </b-nav-item-dropdown>
        </b-navbar-nav>
    </b-navbar>
</template>

<script>
export default {
    name: "Header",
    methods: {
        user() {
            return this.$store.getters.user;
        }
    }
}
</script>

<style scoped>

</style>
