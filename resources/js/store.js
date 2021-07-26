import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export default {
    state: {
        is_loading: false,
        user: {},
        dicts: {},
    },

    mutations: {
        SET_DICTS: (state, dicts) => {
            state.dicts = { ...state.dicts, ...dicts };
        },

        SET_USER: (state, user) => {
            state.user = user;
        },

        SET_IS_LOADING: (state, isLoading) => {
            state.is_loading = isLoading;
        },

    },

    actions: {
        INITIALIZE: async ({ commit, state }, dictNames) => {
            await Api.initialize(dictNames, (user, dicts) => {
                commit('SET_DICTS', dicts);
                commit('SET_USER', user);
            });
        },

        FETCH_USER: ({ commit }) => new Promise((resolve, reject) => {
            Api.user().then((user) => {
                commit('SET_USER', user.data);
                resolve();
            });
        }),

    },

    getters: {
        user: (state) => state.user,

        getDict: (state) => (dictName) => state.dicts[dictName] || [],

        getActualDict: (state, getters) => (dictName, begda = 'begda', endda = 'endda') => {
            const currentDate = moment().startOf('day');
            const dictCollection = getters.getDict(dictName);
            return dictCollection.filter((dictItem) => {
                if (!dictItem[begda] || !dictItem[endda]) {
                    return true;
                }
                const beginDate = moment(dictItem[begda]);
                const endDate = moment(dictItem[endda]);
                return currentDate.isSameOrAfter(beginDate) && currentDate.isSameOrBefore(endDate);
            });
        },

        getDictItemById: (state) => (dictName, id) => {
            const dict = state.dicts[dictName] || [];
            for (const i in dict) {
                if (dict[i].id === id) return dict[i];
            }
            return null;
        },

        getFileTypeLabelById: (state) => (id) => {
            const { label } = state.dictFileTypes.find((e) => e.PK_DICT_FILE_TYPE === id);
            return label;
        },

        hasPermission: (state) => (permissionName) => {
            const found = state.user.all_permissions.find((permission) => permission.name === permissionName);
            return !!found;
        },

        hasRole: (state) => (roleName) => {
            const found = state.user.roles.find((role) => role.name === roleName);
            return !!found;
        },

        getAchievementsCategories: (state) => (campaignId) => state.achievements[campaignId] || [],

        /**
         * Ф-я возвращает первую найденную роль
         */
        getRole: (state) => (roleName) => state.user.roles.find((role) => role.name === roleName),

        /**
         * Ф-я возвращает массив ролей с указанным именем
         */
        getRoles: (state) => (roleName) => state.user.roles.filter((role) => role.name === roleName),
    },
};
