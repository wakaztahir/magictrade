package main

import (
	"fmt"
	"github.com/a-h/templ"
	"magictrade/frontend/pages"
	"net/http"
)

func main() {

	http.Handle("/", templ.Handler(frontend.Home()))

	fmt.Println("Listening on :3000")
	http.ListenAndServe(":3000", nil)
}
