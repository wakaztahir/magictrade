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
	http.Handle("/terms", templ.Handler(frontend.Terms()))
	http.Handle("/faq", templ.Handler(frontend.Faq()))
	http.Handle("/check", templ.Handler(frontend.CheckTrade()))
	http.Handle("/start", templ.Handler(frontend.StartTrade()))

	fmt.Println("Listening on :3000")
	http.ListenAndServe(":3000", nil)
}
