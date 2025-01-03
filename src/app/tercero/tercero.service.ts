import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import {  Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

import { Tercero } from './tercero';

@Injectable({
  providedIn: 'root'
})
export class TerceroService {
  private apiTerceroURL = "http://localhost:8000/api/tercero/";

  private apiElementosListasURL = "http://localhost:8000/api/elementosListas/";

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }

  constructor(private httpClient: HttpClient) { }

  getTipoIdentificacion(): Observable<Tercero[]> {
    return this.httpClient.get<Tercero[]>(this.apiElementosListasURL+"getTipoIdentificacion")
    .pipe(
      catchError(this.errorHandler)
    )
  }
  
  getTipoTercero(): Observable<Tercero[]> {
    return this.httpClient.get<Tercero[]>(this.apiElementosListasURL+"getTipoTercero")
    .pipe(
      catchError(this.errorHandler)
    )
  }

  getDepartamento(): Observable<Tercero[]> {
    return this.httpClient.get<Tercero[]>(this.apiElementosListasURL+"getDepartamento")
    .pipe(
      catchError(this.errorHandler)
    )
  }

  getCiudad(): Observable<Tercero[]> {
    return this.httpClient.get<Tercero[]>(this.apiElementosListasURL+"getCiudad")
    .pipe(
      catchError(this.errorHandler)
    )
  }

  getTipoContribuyente(): Observable<Tercero[]> {
    return this.httpClient.get<Tercero[]>(this.apiElementosListasURL+"getTipoContribuyente")
    .pipe(
      catchError(this.errorHandler)
    )
  }   

  getAll(): Observable<Tercero[]> {
    return this.httpClient.get<Tercero[]>(this.apiTerceroURL)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  create(Tercero): Observable<Tercero> {
    return this.httpClient.post<Tercero>(this.apiTerceroURL, JSON.stringify(Tercero), this.httpOptions)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  find(id): Observable<Tercero> {
    return this.httpClient.get<Tercero>(this.apiTerceroURL + id)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  update(id, Tercero): Observable<Tercero> {
    return this.httpClient.put<Tercero>(this.apiTerceroURL + id, JSON.stringify(Tercero), this.httpOptions)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  delete(id){
    return this.httpClient.delete<Tercero>(this.apiTerceroURL + id, this.httpOptions)
    .pipe(
      catchError(this.errorHandler)
    )
  }

  errorHandler(error) {
    let errorMessage = '';
    if(error.error instanceof ErrorEvent) {
      errorMessage = error.error.message;
    } else {
      errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
    }
    return throwError(errorMessage);
  }
}
