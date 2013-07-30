less = {
        env: "development", // or "production"
        async: false,       // load imports async
        fileAsync: false,   // load imports async when in a page under
                            // a file protocol
        poll: 1000,         // when in watch mode, time in ms between polls
        functions: {},      // user functions, keyed by name
        dumpLineNumbers: "comments", // or "mediaQuery" or "all"
        relativeUrls: true,// whether to adjust url's to be relative
                            // if false, url's are already relative to the
                            // entry less file
        rootpath: "/DataSpotGhent/public/"// a path to add on to the start of every url
                            //resource
};