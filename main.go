package main

import (
	"fmt"
	"github.com/a-h/templ"
	"magictrade/frontend/pages"
	"net/http"
)

func main() {

	http.HandleFunc("/static/main.css", func(w http.ResponseWriter, r *http.Request) {
		http.ServeFile(w, r, "static/main.css")
	})
	http.Handle("/", templ.Handler(frontend.Home()))

	fmt.Println("Listening on :3000")
	http.ListenAndServe(":3000", nil)
}
