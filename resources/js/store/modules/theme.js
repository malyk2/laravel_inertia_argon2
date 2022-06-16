// import { auth as api } from '@/api'

const state = () => ({
  hideConfigButton: false,
  isPinned: true,
  showConfig: false,
  sidebarType: "bg-white",
  isRTL: false,
  mcolor: "",
  darkMode: false,
  isNavFixed: false,
  isAbsolute: false,
  showNavs: true,
  showSidenav: true,
  showNavbar: true,
  showFooter: true,
  showMain: true,
  layout: "default"
})

const getters = {};
const actions = {
  toggleSidebarColor({ commit }, payload) {
    commit("sidebarType", payload);
  },
  setSidebarColor({ commit }, color) {
    commit("sidebarColor", color);
  },

};
const mutations = {
  toggleConfigurator(state) {
    state.showConfig = !state.showConfig;
  },
  navbarMinimize(state) {
    const sidenav_show = document.querySelector(".g-sidenav-show");

    if (sidenav_show.classList.contains("g-sidenav-hidden")) {
      sidenav_show.classList.remove("g-sidenav-hidden");
      sidenav_show.classList.add("g-sidenav-pinned");
      state.isPinned = true;
    } else {
      sidenav_show.classList.add("g-sidenav-hidden");
      sidenav_show.classList.remove("g-sidenav-pinned");
      state.isPinned = false;
    }
  },
  sidebarType(state, payload) {
    state.sidebarType = payload;
  },
  sidebarColor(state, color) {
    state.mcolor = color;
  },
  navbarFixed(state) {
    if (state.isNavFixed === false) {
      state.isNavFixed = true;
    } else {
      state.isNavFixed = false;
    }
  }

}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
}


