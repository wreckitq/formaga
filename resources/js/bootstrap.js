import 'alpinejs';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'
import Chart from 'chart.js';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

window.focusTrap = function (element) {
    const focusableElements = getFocusableElements(element)
    const firstFocusableEl = focusableElements[0]
    const lastFocusableEl = focusableElements[focusableElements.length - 1]

    // Wait for the case the element was not yet rendered
    setTimeout(() => firstFocusableEl.focus(), 50)

    /**
     * Get all focusable elements inside `element`
     * @param {HTMLElement} element - DOM element to focus trap inside
     * @return {HTMLElement[]} List of focusable elements
     */
    function getFocusableElements(element = document) {
        return [
            ...element.querySelectorAll(
                'a, button, details, input, select, textarea, [tabindex]:not([tabindex="-1"])'
            ),
        ].filter((e) => !e.hasAttribute('disabled'))
    }

    function handleKeyDown(e) {
        const TAB = 9
        const isTab = e.key.toLowerCase() === 'tab' || e.keyCode === TAB

        if (!isTab) return

        if (e.shiftKey) {
            if (document.activeElement === firstFocusableEl) {
                lastFocusableEl.focus()
                e.preventDefault()
            }
        } else {
            if (document.activeElement === lastFocusableEl) {
                firstFocusableEl.focus()
                e.preventDefault()
            }
        }
    }

    element.addEventListener('keydown', handleKeyDown)

    return function cleanup() {
        element.removeEventListener('keydown', handleKeyDown)
    }
};

window.initAlpine = function () {
    function setItemToLocalStorage(name, value) {
        window.localStorage.setItem(name, value)
    }

    function getItemFromLocalStorage(name, defaultValue) {
        // if user already changed the theme, use it
        if (window.localStorage.getItem(name)) {
            return JSON.parse(window.localStorage.getItem(name))
        }

        // else return their preferences
        return defaultValue
    }

    function getThemeFromLocalStorage() {
        let defaultValue = (
            !!window.matchMedia &&
            window.matchMedia('(prefers-color-scheme: dark)').matches
        );

        return getItemFromLocalStorage('dark', defaultValue)
    }

    const kitchenSink = document.querySelector('#kitchen-sink-menu');

    if (kitchenSink && kitchenSink.dataset.isActive) {
        setItemToLocalStorage('isKitchenSinkMenuOpen', true);
    } else {
        setItemToLocalStorage('isKitchenSinkMenuOpen', false);
    }

    return {
        dark: getThemeFromLocalStorage(),
        toggleTheme() {
            this.dark = !this.dark
            setItemToLocalStorage('dark', this.dark)
        },
        isSideMenuOpen: false,
        toggleSideMenu() {
            this.isSideMenuOpen = !this.isSideMenuOpen
        },
        closeSideMenu() {
            this.isSideMenuOpen = false
        },
        isNotificationsMenuOpen: false,
        toggleNotificationsMenu() {
            this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
        },
        closeNotificationsMenu() {
            this.isNotificationsMenuOpen = false
        },
        isProfileMenuOpen: false,
        toggleProfileMenu() {
            this.isProfileMenuOpen = !this.isProfileMenuOpen
        },
        closeProfileMenu() {
            this.isProfileMenuOpen = false
        },
        isKitchenSinkMenuOpen: getItemFromLocalStorage('isKitchenSinkMenuOpen', false),
        toggleKitchenSinkMenu() {
            this.isKitchenSinkMenuOpen = !this.isKitchenSinkMenuOpen
            setItemToLocalStorage('isKitchenSinkMenuOpen', this.isKitchenSinkMenuOpen)
        },
        // Modal
        isModalOpen: false,
        trapCleanup: null,
        openModal() {
            this.isModalOpen = true
            this.trapCleanup = window.focusTrap(document.querySelector('#modal'))
        },
        closeModal() {
            this.isModalOpen = false
            this.trapCleanup()
        },
    }
}

// start pie chart
    /**
     * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
     */
    const pieConfig = {
        type: 'doughnut',
        data: {
            datasets: [
                {
                    data: [33, 33, 33],
                    /**
                     * These colors come from Tailwind CSS palette
                     * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                     */
                    backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
                    label: 'Dataset 1',
                },
            ],
            labels: ['Shoes', 'Shirts', 'Bags'],
        },
        options: {
            responsive: true,
            cutoutPercentage: 80,
            /**
             * Default legends are ugly and impossible to style.
             * See examples in charts.html to add your own legends
             *  */
            legend: {
                display: false,
            },
        },
    }

    // change this to the id of your chart element in HMTL
    const pieCtx = document.getElementById('pie')
    window.myPie = new Chart(pieCtx, pieConfig)
// end pie chart

// start line chart
    /**
     * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
     */
    const lineConfig = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Organic',
                    /**
                     * These colors come from Tailwind CSS palette
                     * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                     */
                    backgroundColor: '#0694a2',
                    borderColor: '#0694a2',
                    data: [43, 48, 40, 54, 67, 73, 70],
                    fill: false,
                },
                {
                    label: 'Paid',
                    fill: false,
                    /**
                     * These colors come from Tailwind CSS palette
                     * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
                     */
                    backgroundColor: '#7e3af2',
                    borderColor: '#7e3af2',
                    data: [24, 50, 64, 74, 52, 51, 65],
                },
            ],
        },
        options: {
            responsive: true,
            /**
             * Default legends are ugly and impossible to style.
             * See examples in charts.html to add your own legends
             *  */
            legend: {
                display: false,
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true,
            },
            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month',
                    },
                },
                y: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value',
                    },
                },
            },
        },
    }

    // change this to the id of your chart element in HMTL
    const lineCtx = document.getElementById('line')
    window.myLine = new Chart(lineCtx, lineConfig)
// end line chart

// start bar chart
    /**
     * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
     */
    const barConfig = {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label: 'Shoes',
                    backgroundColor: '#0694a2',
                    // borderColor: window.chartColors.red,
                    borderWidth: 1,
                    data: [-3, 14, 52, 74, 33, 90, 70],
                },
                {
                    label: 'Bags',
                    backgroundColor: '#7e3af2',
                    // borderColor: window.chartColors.blue,
                    borderWidth: 1,
                    data: [66, 33, 43, 12, 54, 62, 84],
                },
            ],
        },
        options: {
            responsive: true,
            legend: {
                display: false,
            },
        },
    }

    const barsCtx = document.getElementById('bars')
    window.myBar = new Chart(barsCtx, barConfig)
// end bar chart
