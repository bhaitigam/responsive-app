/** @type {import('tailwindcss').Config} */
module.exports = {
    // content: [
    //     "./resources/views/**/*.blade.php",
    //     "./resources/js/**/*.js",
    // ],

    content: [
        "./app/**/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                "surface-variant": "#e5e2e1",
                "primary-container": "#e2165f",
                "on-secondary-fixed": "#20005f",
                "tertiary-container": "#9b6b00",
                "inverse-primary": "#ffb2be",
                "on-error": "#ffffff",
                "on-primary-container": "#fffbff",
                "secondary-container": "#7c4dff",
                "surface-dim": "#dcd9d9",
                "error-container": "#ffdad6",
                "on-tertiary-fixed": "#281900",
                "on-primary": "#ffffff",
                "inverse-on-surface": "#f3f0ef",
                "on-primary-fixed": "#400014",
                "inverse-surface": "#303030",
                "outline": "#8f6f73",
                "surface-container-lowest": "#ffffff",
                "surface-container-low": "#f6f3f2",
                "background": "#fcf9f8",
                "on-secondary-fixed-variant": "#4f00d0",
                "secondary-fixed": "#e8deff",
                "outline-variant": "#e4bdc2",
                "tertiary": "#7b5500",
                "on-surface-variant": "#5b3f43",
                "on-tertiary-fixed-variant": "#604100",
                "on-background": "#1b1c1c",
                "primary-fixed-dim": "#ffb2be",
                "primary": "#b80049",
                "surface-container-highest": "#e5e2e1",
                "tertiary-fixed-dim": "#ffba38",
                "surface-container": "#f0eded",
                "error": "#ba1a1a",
                "on-surface": "#1b1c1c",
                "surface-bright": "#fcf9f8",
                "on-tertiary-container": "#fffbff",
                "primary-fixed": "#ffd9de",
                "on-secondary": "#ffffff",
                "surface-container-high": "#eae7e7",
                "on-tertiary": "#ffffff",
                "on-secondary-container": "#fcf6ff",
                "on-primary-fixed-variant": "#900038",
                "tertiary-fixed": "#ffdeac",
                "on-error-container": "#93000a",
                "surface-tint": "#bc004b",
                "secondary": "#632ce5",
                "surface": "#fcf9f8",
                "secondary-fixed-dim": "#cdbdff",

                "on-surface": "#1b1c1c",
                "on-surface-variant": "#5b3f43",

                "primary-container": "#e2165f",
                "secondary-container": "#7c4dff",

            },

            // borderRadius: {
            //     DEFAULT: "0.25rem",
            //     lg: "0.5rem",
            //     xl: "0.75rem",
            //     full: "9999px",
            // },
            "borderRadius": {
                "DEFAULT": "0.5rem",
                "sm": "0.25rem",
                "md": "0.75rem",
                "lg": "1rem",
                "xl": "1.5rem",
                "full": "9999px"
            },

            spacing: {
                gutter: "24px",
                xs: "4px",
                sm: "12px",
                md: "24px",
                lg: "48px",
                xl: "80px",
                base: "8px",
                gutter: "24px",
                "container-max": "1200px",
            },

            maxWidth: {
                "container-max": "1200px",
            },

            fontFamily: {
                "display-lg-mobile": ["Plus Jakarta Sans", "sans-serif"],
                "display-lg": ["Plus Jakarta Sans", "sans-serif"],
                "headline-md": ["Plus Jakarta Sans", "sans-serif"],
                "body-md": ["Inter", "sans-serif"],
                "body-lg": ["Inter", "sans-serif"],
                "label-sm": ["Inter", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
            },

            fontSize: {
                "display-lg-mobile": [
                    "32px",
                    {
                        lineHeight: "40px",
                        letterSpacing: "-0.02em",
                        fontWeight: "700",
                    },
                ],

                "display-lg": [
                    "48px",
                    {
                        lineHeight: "56px",
                        letterSpacing: "-0.02em",
                        fontWeight: "700",
                    },
                ],

                "headline-md": [
                    "24px",
                    {
                        lineHeight: "32px",
                        letterSpacing: "-0.01em",
                        fontWeight: "600",
                    },
                ],

                "body-md": [
                    "16px",
                    {
                        lineHeight: "24px",
                        fontWeight: "400",
                    },
                ],

                "body-lg": [
                    "18px",
                    {
                        lineHeight: "28px",
                        fontWeight: "400",
                    },
                ],

                "label-sm": [
                    "14px",
                    {
                        lineHeight: "20px",
                        letterSpacing: "0.01em",
                        fontWeight: "600",
                    },
                ],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/container-queries"),
    ],
