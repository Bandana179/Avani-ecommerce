module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#dfcc7f",
                "hover-color": "#C7B87B",
                "dashboard-bg": "#F8F9FA",
                "card-border": "#6c757e40",
                "hover-card-border": "#adb5bd",
            },
        },
    },
    plugins: [
        require("@tailwindcss/aspect-ratio"),
        require("@tailwindcss/forms"),
        require("flowbite/plugin"),
    ],
};
